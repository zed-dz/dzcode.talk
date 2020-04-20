<?php 


/abc/  : abc

/2:3/ : 12:3:4;d;l

\d : 0 to 9
\w : a to z , A to Z , 0 to 9
\s : while space , tab etc..

(\W,\S,\D) : will search for the negation expl W search for anything except a word caracter)

^ : the start of the string (regx)
$ : the end " " " " " " " " 
* : repeated zero or more times
+ : repeated one or more times
? : repeated zero or one  juste the letter before it !! so you need to use groupe () for a lot of chars

. : single character , letter , number , whitspace etc..

\. : escape it means : .
\$ : $
\* ! *
MetaCharacters (Need to be escaped):
.[{()\^$|?*+

etc...

| : or 



patterns are case sensitive means
/abc/ == /Abc/ it is wrong
but we can add ' i ' to make it true
/abc/i == /Abc/

{} : repetetion 

d{1} : one d 
d{2} : two d at a row
d{1,2} : one or 2 d in a row
d{1,} : one or more d at a row


[] : match one of any char in the brakckets and only  one

[ - ] : add a range 

[^ ] : to negate ( negation ) what is inside the brakckets

preg_match($reg_exp,$string) : 1 if it matches or 0 of it doesnt

preg_match("/[a-z]+/", "abcd") -> 1

preg_match($reg_exp,$string,$matches)

preg_match("/[a-z]+/", "abcd",$matches) 
$matches => ["abcd"]

regex dont allow us to capture text so we use parentheses to capture as a groupe 
()

preg_match($reg_exp,$string,$matches)

$reg_exp : /a([123]+)b/
$String : a222b
$matches : [ 0 => "a222b"
			 1 => "222"
			]

$reg_exp : /([a-zA-Z]+) (\d+)/
$String : Jan 1998
$matches : [ 0 => "Jan 1998"
			 1 => "Jan"
			 2 => "1998"
			]

(?<name>regex) = give the groupe a name

$reg_exp : /(?<month>[a-zA-Z]+) (?<year>\d+)/
$String : Jan 1998

$matches : [ ...,
			 "month" => "Jan"
			 "year" => "1998"
			]

preg_replace($reg_exp,$replace,$string)

$reg_exp : /\d+/ 
$replace : --
$string : abcd123456efg

=> abcd--def


$reg_exp : /\s+/ 
$replace : ,
$string : a b   c     d

=> a,b,c,d


to refer to a capture groupe we use \1 for the first one \2 \3 etc...

$reg_exp : /(\w+) and (\w+)/ 
$replace : \1 or \2
$string : Amine and Rym

=> Amine or Rym







exemples : 


/ab\d/ : ab2316545649843
/ \d\d / : ab23 
/ \w\s\d / : ab  34

/^abc/ : abcds , abc564 ,abcazer899 
/^abc$/ : abc , abclskfabc 

/a*bc/ : bc
/a+bc/ : abc , aaaabc
/ab.de/ : abcde , ab de , ab4de , ab-de
/abc.*/ : (any number of any charatcers)  abcdef , abc 
/abc\./ : abc.
/abc/i : Abc , abc 

/a[123]c/ : a1c , a2c , a3c
/a[123]+c/ : a12321231c 
/a[1-4]c/ : a4c , a2c

/[a-z0-9 ]+/ : hello there , im 18 years old ( whitspace numbers letters )


/a[^123]b/ : all the caracters except 1,2,3 : a4b , a9b ,a7b
/[^a-z]+/ : HELLO WORLD 

String = "^My name is amine"

preg_match_all("/\^M.*e$/",$string,$array); 
'debut vc ^M puis tout les mots apres puis fini vc e '
print_r($array);

Mr. Amine
Mr Smith
Mrs. Robanson
Mr T

M(r|s|rs)\.?\s[A-Z]\w*  "start with M and then a groupe of r or s or rs and then the char . that it is optional and a space and then a start of a uppercase name and then a bunch of letters that are also optional "



CoreyMSchafer@gmail.com
corey.schafer@university.edu
corey-321-schafer@my-work.net

this case :

[a-zA-Z0-9.-]+@[a-zA-Z-]+\.(com|edu|net)

emails in general :

[a-zA-Z0-9._+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+

$website = test_input($_POST["website"]);

if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
  $websiteErr = "Invalid URL";
}




https://www.google.com
http://coremys.com
https://youtube.com
https://www.nasa.gov

:


https?://(www\.)?\w+\.\w+


ctrl + h : put the regex with groups https?://(www\.)?(\w+)(\.\w+)

and then replace with what you want using backreferencing \1 \2 etc.. :

groupe 1: \1
groupe 2: \2

( its like preg_replace )
also like this :

\1\2


?>