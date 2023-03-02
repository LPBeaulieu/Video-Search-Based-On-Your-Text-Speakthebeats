from random import sample
import json
import sys
import csv
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.decomposition import NMF


text = sys.argv[1]

if len(sys.argv)>2:
    if type(sys.argv[2:]) == list:
        excluded_movie_genres = []
        for i in range(len(sys.argv[2:])):
            if "international" == sys.argv[2:][i]:
                excluded_movie_genres.extend(["international movies", "international tv shows"])
            elif "dramas" == sys.argv[2:][i]:
                excluded_movie_genres.extend(["dramas", "tv dramas"])
            elif "sci-fi" == sys.argv[2:][i]:
                excluded_movie_genres.extend(["sci-fi & fantasy", "tv sci-fi & fantasy"])
            elif "horror" == sys.argv[2:][i]:
                excluded_movie_genres.extend(["horror", "tv horror"])
            elif "thrillers" == sys.argv[2:][i]:
                excluded_movie_genres.extend(["thrillers", "tv thrillers", "action & adventure", "tv action & adventure"])
            elif "kids" == sys.argv[2:][i]:
                excluded_movie_genres.extend(["kids' tv", "children & family movies"])
            elif "comedy" == sys.argv[2:][i]:
                excluded_movie_genres.extend(["stand-up comedy & talk shows", "stand-up comedy", "tv comedies", "comedies"])
            elif "romantic" == sys.argv[2:][i]:
                excluded_movie_genres.extend(["romantic movies", "romantic tv shows"])
            elif "learning" == sys.argv[2:][i]:
                excluded_movie_genres.extend(["docuseries", "documentaries", "science & nature tv", "faith & spirituality"])
    elif type(sys.argv[2:]) == str:
        excluded_movie_genres = [sys.argv[2]]

else:
    excluded_movie_genres = []

def reel():
    
    data = []

    with open('netflix_titles.csv') as f:
        reader = csv.reader(f, delimiter=',')
        for row in reader:
            data.append(row)

    indexes = sample(range(1, len(data)), k = 1000)

    synopsis = [text]
    for i in indexes:
        if data[i][11] == None:
            continue
        elif data[i][10] not in [None, ' ', '']:
            for genre in data[i][10].split(", "):
                if genre.lower() in excluded_movie_genres:
                    break
                elif genre == (data[i][10].split(", "))[-1]:
                    synopsis.append(data[i][11])
                else:
                    continue
        else:
            continue

    synopsis_titles = [[text, 'title']]
    for i in indexes:
        if data[i][11] == None:
            continue
        elif data[i][10] not in [None, ' ', '']:
            for genre in data[i][10].split(", "):
                if genre.lower() in excluded_movie_genres:
                    break
                elif genre == (data[i][10].split(", "))[-1]:
                    synopsis_titles.append([data[i][11], data[i][2]])
                else:
                    continue
        else:
            continue

    tfidf = TfidfVectorizer(max_df = 0.95, min_df = 2, stop_words = 'english')
    dtm  = tfidf.fit_transform(synopsis)

    nmf_model = NMF(n_components = 50)
    nmf_model.fit(dtm)
    topic_results = nmf_model.transform(dtm)

    synopsis_by_category = []
    for index in range(len(synopsis_titles)):
        synopsis_category = topic_results[index].argmax()
        synopsis_by_category.append([synopsis_category, synopsis_titles[index]])

    text_category = synopsis_by_category[0][0]


    #if you want to append the data for the text category in a csv txt file, uncomment the following 5 lines of code:
    #with open('/opt/lampp/htdocs/ReelTalk/reeltalk.txt', 'w+', encoding='UTF8') as f:
    #    writer = csv.writer(f)
    #    for index in range(len(synopsis_by_category)):
    #        if synopsis_by_category[index][0] == text_category:
    #            writer.writerow([synopsis_by_category[index][1][0], synopsis_by_category[index][1][1]])

    synopsis_by_category.pop(0)

    synopsis_text_category = []
    for index in range(len(synopsis_by_category)):
        if synopsis_by_category[index][0] == text_category:
            synopsis_text_category.append([synopsis_by_category[index][1][1], synopsis_by_category[index][1][0]])

    if len(synopsis_text_category)>20:
        random_indexes = sample(range(0, len(synopsis_text_category)), k = 20)

        for index in random_indexes:
            output[synopsis_text_category[index][0]] = synopsis_text_category[index][1]

    else:
        for index in range(len(synopsis_text_category)):
            output[synopsis_text_category[index][0]] = synopsis_text_category[index][1]

    if len(output) >=5:
            print(json.dumps(output))
            global loop_on
            loop_on = False          

output = {}    
loop_on = True
while loop_on:
    try:
        
        reel()
            
    except:
        pass
    
