<h2>Förbättringar</h2>
<p>
  Initialt så vill jag ta bort den kod som hanterar uppladdning utav bildfiler i LibraryControllern. Men eftersom den fungerar lokalt och ej på studentservern pga skrivrättigheter, så fanns en tanke att jag kanske skulle kunna få det att fungera. Men förstår nu i efterhand att det är den koden som höjer komplexiteten på LibraryControllern, och mycket utav kod kopplat till den är oanvänd som formuläret som skapats med Make. Så många utav mina förbättringar kommer att vara att se över hur mycket den funktionaliteten har påverkat min rapport.
</p>

<h4>Mer tester.</h4>
<p>
  Jag kommer att göra fler tester, och speciellt fokusera på mina Controllers. Mycket i rapporterna har indikerat att koden i LibraryControllern kan ha problem, så vill jag se hur det kommer att se ut med en högre code coverage percent. Vill se hur det ser ut med bara ett sättet där användare kan lägga till en bild med en url i min CRUD Library App. Men vill även se ifall jag kan finna några felsteg i min logik i LIbraryControllerns metoder.
</p>
<h4>Ta bort kod som laddar upp bildfiler</h4>
<p>
  I LibraryControllern sa finns det två sätt att lägga till en bild. Jag kommer att ta bort den kod som bara fungerar lokalt, men ej på studentservern. Mycket utav den kod, har skapats med Make, och använder mer importerade komponenter. Så vill se hur mycket som detta kan påverka mätvärden i dem båda rapporterna.
</p>

<h4>
  Validering i LibraryControllern
</h4>
<p>
  I min LibraryController så tänkte jag se över dem if statements som hanterar användarinput, och se om jag kan göra bättre validering kollar för formulär fälten. Det finns även ett formulär som skapades med Make, som används med filuppladdningskoden. Så återigen så kommer jag ta bort denna kod, då den kommer vara oanvänd, och se hur mycket utav den koden förändrar mätvärdena.
</p>