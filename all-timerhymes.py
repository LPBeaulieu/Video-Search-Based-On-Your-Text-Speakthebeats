from random import sample
import json
import sys
import re
import csv
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.decomposition import NMF


#These lists are for the capitalization of titles and I believe they follow the Wikipedia guidelines
do_not_capitalize_these_words = ["a", "amid", "an", "and", "anti", "at", "atop", "but", "by", "down", "due", "for", "from", "in", "into", "less", "like", "near", "not", "of", "off", "on", "onto", "or", "over", "past", "per", "plus", "pro", "so", "the", "to", "up", "upon", "via", "with", "yet"]
complex_prepositions_capitalized = ["All Save", "In Case of", "In Face of", "In Lieu of", "In View of", "Next to", "On Top of", "Out of", "Save for", "in Case of", "in Face of", "in Lieu of", "in View of", "on Top of"]
complex_prepositions_lowercased = ["All save", "In case of", "In face of", "In lieu of", "In view of", "next to", "On top of", "out of", "save for", "in case of", "in face of", "in lieu of", "in view of", "on top of"]


text = sys.argv[1]

def rhyme():

    data = []
    with open('poetry_database.csv') as f:
        reader = csv.reader(f, delimiter='/')
        for row in reader:
            data.append(row)

    indexes = sample(range(1, 1003), k = 1000)

    poems = [text]
    for index in indexes:
        poems.append(data[index][4][:500])


    titles_poems_URL = [['title', text, 'URL']]
    for index in indexes:
            #This code capitalizes the poem titles. A list of poem title words is constructed through a re.split() method, splitting at every non-word character,
            #and then the list elements containing an apostrophe are located using a list.index() method, with a list_index counter allowing to avoid always
            #selecting the same hits. The apostrophe list elements, of which the preceding element is the letter "O", and of which the next list element is either of the words
            #"clock" or "er", are merged together to form "O'clock" and "O'er", which will avoid "clock" and "er" being capitalized later in the code. The same goes for all
            #other contractions such as "I'll". The only words containing apostrophes not merged are surnames containing "O'", like "O'Neil", because the counterpart of the OR statement
            #excludes results in which the list element preceding the apostrophe is "O". After the list element initially containing only the apostrophe is replaced with the concatenation of
            #the element before and after it, these other list elements are replaced with an empty string, so as to avoid repetitions and to preserve the list index count after substitutions.
            #I should mention that this code gets a bit confusing, as it refers to list indexes of lists themselves containing string indices of re.finditer().start() search hits.
            #Please read carefully.

            poem_title = data[index][0].strip()
            poem_title_words = re.split('(\W+)', poem_title)
            list_index = 0

            #here I use a 'for i in range(len(poem_title_words))' loop for clarity, as it needs to stop at the index -2, to allow for a character to be after the apostrophe (at position -1), otherwise the apostrophe would be at position -1 and 'poem_title_words[apostrophe_list_index+1]' would lead to an IndexError.
            for i in range(len(poem_title_words)):
                if poem_title_words[i] == "'" or poem_title_words[i] == "’" and i <= len(poem_title_words)-2:
                    apostrophe_list_index = poem_title_words.index(poem_title_words[i], list_index)
                    if (poem_title_words[apostrophe_list_index-1].lower() == "o" and poem_title_words[apostrophe_list_index+1].lower() in ["clock", "er"]) or (poem_title_words[apostrophe_list_index-1][-1].isalpha() and poem_title_words[apostrophe_list_index+1].isalpha() and poem_title_words[apostrophe_list_index-1].lower() != "o"):
                        poem_title_words[apostrophe_list_index] = poem_title_words[apostrophe_list_index-1] + poem_title_words[apostrophe_list_index] + poem_title_words[apostrophe_list_index+1]
                        poem_title_words[apostrophe_list_index-1] = ""
                        poem_title_words[apostrophe_list_index+1] = ""
                    list_index = apostrophe_list_index+1
            for word in poem_title_words:
                if poem_title_words.index(word) == 0 or poem_title_words.index(word) == len(poem_title_words)-1:
                    poem_title_words[poem_title_words.index(word)] = word.lower().capitalize()
                else:
                    if word in do_not_capitalize_these_words:
                        poem_title_words[poem_title_words.index(word)] = word.lower()
                    else:
                        poem_title_words[poem_title_words.index(word)] = word.lower().capitalize()
            poem_title = ''.join(poem_title_words)
            for complex_preposition in complex_prepositions_capitalized:
                complex_preposition_list_index = complex_prepositions_capitalized.index(complex_preposition)
                preposition_matches = re.finditer(complex_preposition, poem_title)
                preposition_indices_list = [preposition.start() for preposition in preposition_matches]
                for preposition_index in preposition_indices_list:
                    new_complex_preposition = complex_prepositions_lowercased[complex_preposition_list_index]
                    poem_title = poem_title[:preposition_index] + new_complex_preposition + poem_title[preposition_index+len(new_complex_preposition):]

            #The author name is added to the poem title, to constitute the heading of the first frame of the poem text clips.
            author = data[index][2]
            author_words = [w.capitalize() for w in author.lower().split()]
            author = ' '.join(author_words)
            title = "“" + poem_title + "”" + ",\n by " + author

            titles_poems_URL.append([title, data[index][4][:500], data[index][5]])


    tfidf = TfidfVectorizer(max_df = 0.95, min_df = 2, stop_words = 'english')
    dtm  = tfidf.fit_transform(poems)

    nmf_model = NMF(n_components = 50)
    nmf_model.fit(dtm)
    topic_results = nmf_model.transform(dtm)

    poems_by_category = []
    for index in range(len(titles_poems_URL)):
        poem_category = topic_results[index].argmax()
        poems_by_category.append([poem_category, titles_poems_URL[index]])

    text_category = poems_by_category[0][0]

    poems_by_category.pop(0)

    poems_text_category = []
    for index in range(len(poems_by_category)):
        if poems_by_category[index][0] == text_category:
            poems_text_category.append([poems_by_category[index][1][0], poems_by_category[index][1][2]])

    if len(poems_text_category)>20:
        random_indexes = sample(range(0, len(poems_text_category)), k = 20)

        for index in random_indexes:
            output[poems_text_category[index][1]] = poems_text_category[index][0]

    else:
        for poem in poems_text_category:
            output[poem[1]] = poem[0]

    if len(output) >=5:
        print(json.dumps(output))
        global loop_on
        loop_on = False
    else:
        pass

output = {}
loop_on = True
while loop_on:
    try:
        rhyme()
    except:
        pass
