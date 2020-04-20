# typescript  (superset de js en compilant ts on aura du js) -> js angular node js reactjs = backend


print("hello world")

# ctrl+B to launch it in it is console and ESC to hide it
# espace before print is a identation error , a P maj is a syntax error


print(3)
print(1 + 1)
print((52 * 3) + (12 * 9))
print((365 * 24) * (60 * 60))

speed_of_light = 29979258
print(speed_of_light)

minutes = 60
minutes = minutes + 1
print(minutes)
name = 'amine' " hey there wass'up" ' my name also is " kacem "'
name2 = 'amine'+" hey there wass'up"+' my name also is " kacem "'

print(name + name2)

print("hello " + "!" * 3)   # multiply the ! 3 times

name = "Andy"
print(name * 4)

print(name[0])  # print name[-4]
print(name[1])  # print name[-3]
print(name[2])  # print name[-2]
print(name[3])  # print name[-1]

print(name[2:4])  # print the letter from postion 2 to the letter before the postion 4
print(name[0:])  # from pos 0 to the end
print(name[:])   # from begining to the end
print(name[:3])  # selecting from the begining to the letter before 3

s = 'audacity'
print(s[1].upper()+s[2:])  # first letter maj concatinate to the rest

print(s.find('cit'))      # search for 1 occuerence of that and give its postion
print(s.find('a', 0))       # from 0 start searching
print(s.find('a', 1))       # from 1 it starts searching
print(s.find('a', 4))

s += "mino"
print(s)

text = "zip files are zipped"
firstzip = text.find('zip')
print(text.find('zip', firstzip+1))      # to find the second occ of zip
print(text.find('zip', text.find('zip')+1))

sentence = "A NOUN went on a walk. They can VERB really well."

sentence = sentence.replace("NOUN", "duck")      # fill this in
sentence = sentence.replace("VERB", "waddle")    # fill this in
print(sentence)


def say_hello(n):
    greeting = "Hello " + n + "!"
    return greeting


print(say_hello("Miriam"))

print(2 < 3)
print(7*3 <= 21)
print(2 != 2)


def big(a, b):
    if a > b:
        return a
    return b


print(big(4, 6))


def friend(n):
    return n[0] == 'D'


def friend2(n):
    if n[0] == 'a':
        return True
    else:
        if n[0] == 'b':
            return True
        else:
            return False


print(friend("Diane"))
print(friend2("ared"))


def biggest(a, b, c):
    if a > b:
        if a > c:
            return a
        else:
            return c
    else:
        if b > c:
            return b
        else:
            return c


def biggest2(a, b, c):
    return big(big(a, b), c)

# return max(a,b,c)


print(biggest(4, 3, 5))
print(biggest2(4, 5, 11))


def median(a, b, c):
    bigi = biggest(a, b, c)
    if bigi == a:
        return big(b, c)
    else:
        if bigi == b:
            return big(a, c)
        else:
            return big(a, b)


print("------------------------median----------------")
print(median(7, 8, 7))

# This code demonstrates a while loop with a "counting variable"
i = 0
while i < 10:
    print(i)
    i = i+1

# This uses a while loop to remove all the spaces from a string of
# text. Can you figure out how it works?


def remove_spaces(text):
    text_without_spaces = ''     # empty string for now
    while text != '':
        next_character = text[0]
        if next_character != ' ':    # that's a single space
            text_without_spaces = text_without_spaces + next_character
        text = text[1:]
    return text_without_spaces


print(remove_spaces("hello my name is andy how are you?"))


def numbers(x):
        i = 1
        while i <= x:
            if i > x:
                break
            print(i)
            i = i + 1


print(numbers(4))


def printinches(n):
    x = str(n) + ' inches'
    print(x)

# (int)n , (str)n  -> conversion


printinches(42)


def remove(somestring, sub):
    location = somestring.find(sub)
    if location == -1:
        return somestring
    length = len(sub)
    part_before = somestring[:location]
    part_after = somestring[location + length:]
    return part_before + part_after


print(remove('substring institution', 'string in'))
print(remove('ding', 'do'))  # "do" isn't in "ding"; should print "ding"


def weekend(day):
    return day is 'Saturday' or day == 'Sunday'


print(weekend('Monday'))
print(weekend('Saturday'))
print(weekend('July'))

# Let's put it all together. Write code for the function process_madlib, which takes in
# a string "madlib" and returns the string "processed", where each instance of
# "NOUN" is replaced with a random noun and each instance of "VERB" is
# replaced with a random verb. You're free to change what the random functions
# return as verbs or nouns for your own fun, but for submissions keep the code the way it is!

from random import randint


def random_verb():
    random_num = randint(0, 1)
    if random_num == 0:
        return "run"
    else:
        return "kayak"


def random_noun():
    random_num = randint(0, 1)
    if random_num == 0:
        return "sofa"
    else:
        return "llama"


def word_transformer(word):
    if word == "NOUN":
        return random_noun()
    elif word == "VERB":
        return random_verb()
    else:
        return word[0]


def process_madlib(madlib):
    p = ""
    i = 0
    box = 4
    while i < len(madlib):
        frame = madlib[i: i + box]
        add = word_transformer(frame)
        p += add
        if len(add) == 1:
            i += 1
        else:
            i += 4
    return p


# documentation: https://docs.python.org/2/library/functions.html#len

test_string_1 = "This is a good NOUN to use when you VERB your food"
test_string_2 = "I'm going to VERB to the store and pick up a NOUN or two."
print(process_madlib(test_string_1))
print(process_madlib(test_string_2))




string_list = ['HTML', 'CSS', 'Python']
print (string_list)

number_list = [3.14159, 2.71828, 1.61803]
print (number_list)

pi = number_list[0]
not_pi = number_list[1:]
print (pi)
print (not_pi)

mixed_list = ['Hello!', 42, "Goodbye!"]
print (mixed_list)

list_with_lists = [3, 'colors:', ['red', 'green', 'blue'], 'your favorite?']
print (list_with_lists)


days_in_month = [31,28,31,30,31,30,31,31,30,31,30,31]

def how_many_days(month_number):
    return days_in_month[month_number-1]


print (how_many_days(1))

print (how_many_days(9))


nested_list = [['HTML', 'Hypertext'],['CSS' , 'Cascading'],['Python', 'programming language'],['Lists', 'Lists are a data structure']]

first_concept = nested_list[0]

print (first_concept)

first_title = first_concept[0]
first_description = first_concept[1]

print (first_title)
print (first_description)


spy = [0, 0, 7]
agent = spy
spy [2] = agent [2] + 1
print (agent, spy)


def replace_spy(list):
    list [2] = list [2] + 1
    return list

print (replace_spy(agen ksh ma y3awnkt))
