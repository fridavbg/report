<h2>Förbättringar</h2>
<p>
  Initialt så vill jag ta bort den kod som hanterar uppladdning utav bildfiler i LibraryControllern. Men eftersom den fungerar lokalt och ej på studentservern pga skrivrättigheter, så fanns en tanke att jag kanske skulle kunna få det att fungera. Men förstår nu i efterhand att det är den koden som höjer komplexiteten på LibraryControllern, och mycket utav kod kopplat till den är oanvänd som formuläret som skapats med Make. Så många utav mina förbättringar kommer att vara att se över hur mycket den funktionaliteten har påverkat min rapport.
</p>

<h4>Ta bort kod som laddar upp bildfiler</h4>
<p>
  Den kod som hanterar bilduppladddningen, använder fler komponenter så som FileException och Slugger. Så kommer att se över hur mycket detta kan förändra värderna om jag tar bort dem. Speciellt för komplexiteten i LibraryControllern.
</p>
<h4>
  Make formuläret i LibraryControllern
</h4>
<p>
  Det finns även ett formulär som skapades med Make, som används med filuppladdningskoden. Detta formuläret använder också en BookFormType så återigen så kommer jag ta bort denna kod, då den kommer vara oanvänd, och se hur mycket utav det förändrar mätvärdena.
</p>
<h4>Mer tester.</h4>
<p>
  Mycket i rapporterna har indikerat att koden i LibraryControllern kan ha problem, så vill jag se hur det kommer att se ut med en högre code coverage percent efter jag rensat bort kod som ej används. Vill se hur det ser ut med bara ett sätt där användare kan lägga till en bild med en url i min CRUD Library App.
</p>