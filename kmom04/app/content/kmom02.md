Redovisning
====================================
 
Kmom02: PHP-baserade och MVC-inspirerade ramverk
------------------------------------

Tycker att det här kursmomentet var betydligt svårare än det första, samtidigt gav det nog mer också.

Har aldrig använt mig av Composer förut, men tycker det känns väldigt smidigt. Hade inga som helst problem att få det att funka på min linux-burk. Däremot strulade det lite i Windows, vilket antagligen är  pga att jag inte är så van med kommandotolken, men fick det att funka där också till slut. Skönt att kunna lägga till paket genom en minimal ändring i befintlig kod ("require": {"phpmvc/comment": "dev-master"}) och sedan sköta resten via CLI. 

Kände inte till Packagist sedan innan, bra tips! Valde inte att implementera några andra paket. Tycker att det räckte bra med att sätta mig in i och modifiera Comments-paketet.

Glad att jag läste igenom uppgiften noga innan jag satte igång. Nu hade jag hela tiden tanken om att det skulle fungera på två separata sidor med mig. Tror det hade blivit en hel del ändrande i koden när jag kom till den punkten annars.

Supersmidigt med paket. Comments-paketet var ju bra att starta med. Krävdes lite tillägg för att få det att funka som jag ville. Behövde exempelvis lägga till en nyckel i CommentsInSession för att stödja separata kommentarsflöden på olika sidor.

Sen skulle man ju så klart kunna validera datat som tas in lite bättre, men jag tyckte det här var ett väldigt mustigt delmoment så jag valde att lägga krutet på att försöka komma in I MVC-tänket istället.