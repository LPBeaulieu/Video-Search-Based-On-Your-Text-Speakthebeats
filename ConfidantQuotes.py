import csv
import json
import sys
import random
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.decomposition import NMF

text = sys.argv[1]

def confidant():
    
    with open('/opt/lampp/htdocs/SpeakTheBeats/ConfidantQuotes/quotable-master/data/sample/quotes.json') as f:
        quotes = json.load(f)
    with open('/opt/lampp/htdocs/SpeakTheBeats/ConfidantQuotes/quotable-master/data/sample/authors.json') as a:
        authors = json.load(a)
    quotes_only = [text]
    for i in range(len(quotes)):
        quotes_only.append(quotes[i]['content'])

        quotes_and_authors = [[text, 'user']]
    for i in range(len(quotes)):

        quotes_and_authors.append([quotes[i]['content'], quotes[i]['author']])

    tfidf = TfidfVectorizer(max_df = 0.95, min_df = 2, stop_words = 'english')
    dtm  = tfidf.fit_transform(quotes_only)

    nmf_model = NMF(n_components = 50)
    nmf_model.fit(dtm)
    topic_results = nmf_model.transform(dtm)

    quotes_by_category = []
    for index in range(len(quotes_and_authors)):
        quote_category = topic_results[index].argmax()
        quotes_by_category.append([quote_category, quotes_and_authors[index]])
      
    text_category = quotes_by_category[0][0]
    quotes_by_category.pop(0)

    for index in range(len(quotes_by_category)):
        if quotes_by_category[index][0] == text_category:
            output[quotes_by_category[index][1][0]] = quotes_by_category[index][1][1]

    if len(output) >=10:
            print(json.dumps(output))
            global loop_on
            loop_on = False          

output = {}    
loop_on = True
while loop_on:
    try:
        
        confidant()
            
    except:
        pass
