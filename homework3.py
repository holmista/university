import os
import random


def one():
    # check if directory exists
    if not os.path.isdir('myFiles'):
        os.mkdir('myFiles')
    f = open('myFiles/data.txt', 'w')
    f.write('24, 39, -90')
    f.close()

def two():
    f = open('myFiles/data1.txt', 'w')
    for i in range(0, 101):
        f.write(str(i) + '\n')
    f.close()

def three():
    if not os.path.isdir('myFiles1'):
        os.mkdir('myFiles1')
    for i in range(0, 31):
        f = open('myFiles1/' + str(i) + '.txt', 'w')
        f.write('programmer\n')
        f.close()

def four():
    if not os.path.isdir('myFiles2'):
        os.mkdir('myFiles2')
    for i in range(0, 31):
        f = open('myFiles2/' + str(i) + '.txt', 'w')
        f.write('programmer' + str(i) + '\n')
        f.close()

def five():
    if not os.path.isdir('myFiles'):
        os.mkdir('myFiles')
    f = open('myFiles/data2.txt', 'w')
    num1 = int(input('Enter a number: '))
    num2 = int(input('Enter another number: '))
    for i in range(0, 101):
        f.write(str(random.randint(num1, num2)) + '\n')
    f.close()

def seven():
    if not os.path.isdir('myFiles'):
        os.mkdir('myFiles')
    f = open('myFiles/function.txt', 'w')
    for i in range(0, 201):
        f.write(str(i*0.01) + '\n')
    f.close()

def ten():
    dict = {0: 10, 1: 20}
    dict.update({2: 30, 3: 40})
    print(dict)

def eleven():
    dic1={1:10, 2:20}
    dic2={3:30, 4:40}
    dic3={5:50,6:60}
    print({**dic1, **dic2, **dic3})

def twelve(key):
    d = {1: 10, 2: 20, 3: 30, 4: 40, 5: 50, 6: 60}
    if key in d:
        print('Key is present in the dictionary')
    else:
        print('Key is not present in the dictionary')

def thirteen():
    d = {'a': 1, 'b': 2, 'c': 3, 'd': 4, 'e': 5}
    for key, value in d.items():
        print(key, '->', value)

def fourteen():
    d = {}
    for i in range(1, 11):
        d[i] = i**2
    print(d)

