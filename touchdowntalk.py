import random
import json
import sys
import csv
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.decomposition import NMF

text = sys.argv[1]

def speak():

    data = []

    with open('touchdowntalk.csv') as f:
        reader = csv.reader(f, delimiter='\t')
        for row in reader:
            data.append(row)

    synopsis = [text]
    for i in range(len(data)):
        if data[i][4] == None:
            pass
        synopsis.append(data[i][4])

    synopsis_year_title_youtubeID = [[text, ['year', 'category', 'brand', 'title', 'youtubeID', 'AdAge_url' ]]]
    for i in range(len(data)):
        if data[i][4] == None:
            pass
        synopsis_year_title_youtubeID.append([data[i][4], [data[i][0], data[i][1], data[i][2], data[i][3], data[i][5], data[i][6]]])

    tfidf = TfidfVectorizer(max_df = 0.95, min_df = 2, stop_words = 'english')
    dtm  = tfidf.fit_transform(synopsis)

    nmf_model = NMF(n_components = 50)
    nmf_model.fit(dtm)
    topic_results = nmf_model.transform(dtm)

    synopsis_by_category = []
    for index in range(len(synopsis_year_title_youtubeID)):
        synopsis_category = topic_results[index].argmax()
        synopsis_by_category.append([synopsis_category, synopsis_year_title_youtubeID[index]])

    text_category = synopsis_by_category[0][0]

    synopsis_by_category.pop(0)

    synopsis_text_category = []

    for index in range(len(synopsis_by_category)):

        if synopsis_by_category[index][0] == text_category:
            synopsis_text_category.append([synopsis_by_category[index][1][0], synopsis_by_category[index][1][1][0], synopsis_by_category[index][1][1][1], synopsis_by_category[index][1][1][2], synopsis_by_category[index][1][1][3],synopsis_by_category[index][1][1][4] , synopsis_by_category[index][1][1][5] ])
        
    if len(synopsis_text_category)>20:
        random_indexes = random.sample(range(0, len(synopsis_text_category)), k = 20)

        for index in random_indexes:
            output[synopsis_text_category[index][0]] = [ synopsis_text_category[index][1], synopsis_text_category[index][2], synopsis_text_category[index][3], synopsis_text_category[index][4], synopsis_text_category[index][5], synopsis_text_category[index][6] ] 

    else:
        for index in range(len(synopsis_text_category)):
            output[synopsis_text_category[index][0]] = [ synopsis_text_category[index][1], synopsis_text_category[index][2], synopsis_text_category[index][3], synopsis_text_category[index][4], synopsis_text_category[index][5], synopsis_text_category[index][6] ] 
    if len(output) >=10:
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
