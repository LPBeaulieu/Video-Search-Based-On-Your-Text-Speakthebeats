import random
import json
import sys
import csv
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.decomposition import NMF


filenames = []
music_genres = {'rock':'lyrics_rock.txt', 'pop':'lyrics_pop.txt', 'rap':'lyrics_rap.txt', 'country':'lyrics_country.txt'}
text = sys.argv[1]

if len(sys.argv)>2:
    genres_selection = sys.argv[2:]

    if type(genres_selection) == list:
        for genre in genres_selection:
            filenames.append(music_genres[genre])
    elif type(genres_selection) == str:
        filenames.append(genres_selection)

else:
    filenames.extend(['lyrics_rock.txt', 'lyrics_pop.txt', 'lyrics_rap.txt', 'lyrics_country.txt'])



def speak():
    
    data = []
    
    for filename in filenames:
        with open(filename) as f:
            reader = csv.reader(f, delimiter='\t')
            for row in reader:
                data.append(row)

    indexes = random.sample(range(1, len(data)), k = 1000)

    lyrics = [text]
    for i in indexes:
        if data[i][2] == None:
            pass
        lyrics.append(data[i][2])

    lyrics_titles_artists = [[text, ['', 'user']]]
    for i in indexes:
        if data[i][2] == None:
            pass
        lyrics_titles_artists.append([data[i][2], [data[i][0], data[i][1]]])

    tfidf = TfidfVectorizer(max_df = 0.95, min_df = 2, stop_words = 'english')
    dtm  = tfidf.fit_transform(lyrics)

    nmf_model = NMF(n_components = 50)
    nmf_model.fit(dtm)
    topic_results = nmf_model.transform(dtm)

    lyrics_by_category = []
    for index in range(len(lyrics_titles_artists)):
        lyrics_category = topic_results[index].argmax()
        lyrics_by_category.append([lyrics_category, lyrics_titles_artists[index]])

    text_category = lyrics_by_category[0][0]

    #if you want to append the data for the text category in a csv txt file, uncomment the following 5 lines of code:
    #with open('/opt/lampp/htdocs/SpeakTheBeats/speakthebeats.txt', 'w+', encoding='UTF8') as f:
    #    writer = csv.writer(f)
    #    for index in range(len(lyrics_text_category)):
    #        if lyrics_by_category[index][0] == text_category:
    #            writer.writerow([lyrics_by_category[index][1][0], lyrics_by_category[index][1][1][0], lyrics_by_category[index][1][1][1]])

    lyrics_by_category.pop(0)

    lyrics_text_category = []
    for index in range(len(lyrics_by_category)):
        if lyrics_by_category[index][0] == text_category:
            lyrics_text_category.append([lyrics_by_category[index][1][1][0], lyrics_by_category[index][1][1][1]])

    if len(lyrics_text_category)>20:
        random_indexes = random.sample(range(0, len(lyrics_text_category)), k = 20)

        for index in random_indexes:
            output[lyrics_text_category[index][0]] = lyrics_text_category[index][1]
    
    else:
        for index in range(len(lyrics_text_category)):
            output[lyrics_text_category[index][0]] = lyrics_text_category[index][1]
        
    if len(output) >=5:
            print(json.dumps(output))
            global loop_on
            loop_on = False          

output = {}    
loop_on = True
while loop_on:
    try:
        
        speak()
            
    except:
        pass
    


    