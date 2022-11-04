# დაწერეთ პროგრამა, რომელიც შექმნის შემდეგი სახის ლექსიკონს (key არის 1-დან 100-მდე შემთხვევი განსხვავებული
# რიცხვები, ხოლო value- მათი ციფრების ჯამი). ლექსიკონი შედგება 10 ელემენტისგან. დაბეჭდეთ ყველაზე დიდი
# მნიშვნელობის მქონდე ელემენტი (4 ქულა)

import random
def createDictionary():
    dictionary = {}
    for i in range(10):
        key = random.randint(1, 100)
        value = 0
        for j in str(key):
            value += int(j)
        dictionary[key] = value
    return dictionary
# print key with max value in dictionary where keys are numbers



def printBiggestValue(dictionary):
    biggest = 0
    biggestKey = None
    for key in dictionary.keys():
        if dictionary[key] > biggest:
            biggest = dictionary[key]
            biggestKey = key
    print(biggestKey)


print('-----#1-----')
dictionary = createDictionary()
print(dictionary)
printBiggestValue(dictionary)

# დაწერეთ პროგრამა, რომელიც შექმნის სიას (List) და ჩაწერს მასში 20 შემთხვევით მთელ რიცხვს 5-დან 15-შუალედში. იპოვეთ
# სიაში ყველაზე ხშირად განმეორებადი რიცხვი. ასევე მიუთითეთ რამდენჯერ გვხვდება სიაში თითოეული განსხვავებული
# ელემენტი. (4 ქულა)

def createList():
    list = []
    for i in range(20):
        list.append(random.randint(5, 15))
    return list

def findMostCommonNumber(list):
    dict = {}
    for i in list:
        if i in dict:
            dict[i] += 1
        else:
            dict[i] = 1
   # find most common number in dictionary
    mostCommonNumber = i
    for key in dict:
        if dict[key] > dict[mostCommonNumber]:
            mostCommonNumber = key
    return [mostCommonNumber, len(dict)]

print('-----#2-----')
list = createList()
print(list)
[mostCommon, uniqueElements] = findMostCommonNumber(list)
print(f'most common: {mostCommon}, unique elements: {uniqueElements}')

# [10; 500] შუალედიდან, დაბეჭდეთ მხოლოდ ის რიცხვები რომლებსაც აქვთ მხოლოდ ორი გამყოფი, რომლიდანაც ერთი 7-ის
# ტოლია. (დავუშვათ 1-და თავის თავი გამყოფი არ არის. 7-ის გარდა არსებობს მხოლოდ მეორე გამყოფიც, მაგალითად: 77 = 7*11
# დაიბეჭდება, 70 = 7*10=5*14 არ დაიბეჭდება). (4 ქულა)

def printNumbers():
    for i in range(10, 501):
        dividers = []
        for j in range(2, i):
            if i % j == 0:
                dividers.append(j)
        if len(dividers) == 2 and 7 in dividers:
            print(i)

print('-----#3-----')

printNumbers()


