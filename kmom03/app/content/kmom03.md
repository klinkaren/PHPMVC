Redovisning
====================================
 
Kmom03: Bygg ett eget tema
------------------------------------

###Vad tycker du om CSS-ramverk i allmänhet och vilka tidigare erfarenheter har du av dem?
Hade ingen tidigare erfarenhet av CSS-ramverk innan den här kursen startade, så mitt svar här blir relativt kort. Med den ringa erfarenhet jag fått av det här kursmomentet känner jag att det absolut 'r ett bra verktyg att ha med sig i sin kunskapsarsenal.

###Vad tycker du om LESS, lessphp och Semantic.gs?
Less är enligt mig en klar förbättring av CSS. Med less blir CSS-koden mer responsiv och anpassningsbar. Det jag gillar mest är att man kan använda sig av variabler. Innan jag använde less blev jag, ja – rätt less, när jag exempelvis skulle byta en färg i mitt tema och var tvungen att leta reda på alla ställen den färgen förekom och ändra koden. Så mycket smidigare att bara uppdatera på ett ställe. 

###Vad tycker du om gridbaserad layout, vertikalt och horisontellt?
Jag gillar det skarpt! Även om det inledningsvis betyder extra arbete och en längre startsträcka för ett projekt tror jag att man tjänar på att tänka till rejält i början. En webbsidas yttersta syfte är vanligtvis att informera besökaren om det budskap som presenteras. Därför är det väldigt viktigt att texten upplevs lätt att följa – där hjälper en gridbaserad layout till. Samtidigt känns en gridbaserad layout mer professionell. 

###Har du några kommentarer om Font Awesome, Bootstrap, Normalize?
Insåg rätt snabbt att man får tänka sig för när man använder Font Awesome och vill behålla den gridbaserade layouten. När jag kastade upp ett gäng kameror i olika storlekar förstördes layouten. Valde att helt enkelt ta bort ikonen som var 5 gånger förstorad och låta den som bara var 4 gånger förstorad styra radhöjden, vilket löste det. En bättre lösning är antagligen att sätta regler med hjälp av less för hur stor margin-top det ska vara för olika ikonstorlekar.

###Beskriv ditt tema, hur tänkte du när du gjorde det, gjorde du några utsvävningar?
Jag följde till största del guiden när jag byggde temat. Irriterade mig dock på att raderna inte hamnade bredvid varandra på Typografiexemplet (framförallt heading 3 och 4 som förstörde det). Löste det genom att lägga till olika margin-top för olika rubrikstorlekar. Annars försökte jag hålla det så basic som möjligt med gråskala.

###Antog du utmaningen som extra uppgift?
Jag har redan mitt projekt på Github så jag skapade inte något extra Repo enkom för temat. Kmom03 går att nå [här](https://github.com/klinkaren/PHPMVC/tree/master/kmom03)