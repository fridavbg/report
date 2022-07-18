<p>
  Jag har gjort lite TDD sedan tidigare men i JavaScript, och hade nog tyckt mer om att börja med testerna. Men efter jag skrev ett par tester så kändes det rätt ok med PHPUnit, jag valde att göra tester alla klasserna i mina Card, Game och Dice för att öva. Dock ibland så förstod jag inte alltid varför visa test överlappade med andra funktioner, men insåg snabbt att det nog hade att göra med att jag kallar på visa mindre funktioner i dem större funktionerna. Tex min reset funktion i min Blackjack klass som nästan bara samlar ihop flertal funktioner och kallar på dem.  
</p>
<p>
  Jag lyckades ganska snabbt med att få 100% för alla min klasser, men det får mig också att fundera på min kodstruktur, och om allting verkligen borde hänga ihop så som det gör nu. Men antar att jag kan se det som ett bra tecken att jag kunde hitta många olika sätt att testa mina kod på. 
</p>
<p>
  Min största funderingen är väl om det verkligen är en bra ide att ha så många funktionsanrop inuti en annan funktion. Antar att min kod för tillfället är ganska synkron och eventuellt så kanske det kan bli något knas om en funktion måste vänta på en annan. Så tror nog ett förbättringsområde hade varit att se över dem funktionerna som har ett beroende utav en annan funktion.
</p>
<p>
  Jag valde att hålla min kodstruktur mer eller mindre samma som innan. Det mest för att jag lyckades göra en tab med git. Tänkte att jag skulle vara smart och göra en ny gren, men efter jag försökt mig på en merge så trillade en del kod bort och på så vis en del funktionalitet. Så tiden gick mest åt till att städa upp och se till så att allting fungerade på studentservern. 
</p>
<p>
Jag personligen gillar när den kod är testbar och skulle absolut identifiera sådan kod som ren och snygg. Ofta när jag läser tester så känner jag att det gör en snabbare över blick utav vad tex en funktion gör. Dock så känns det ibland lite för logiskt och rätt fram med visa tester, och kan känna att det är svårt att veta när man skall sluta testa en sak. Men försökte att bryta ner och ta en bit i taget. 
</p>
<p>
TIL för detta kmom är att inte stressa i git. Jag trodde att jag hade ganska bra koll på att merga grenar, men vet inte riktigt vad jag gjorde för fel. Men det var en nyttig läxa att lära sig och jag fick gått igenom min kod på ett bra sätt. Kommer absolut vara lite mer vaken när det kommer till att skapa en merge conflict i framtiden. 
</p>
