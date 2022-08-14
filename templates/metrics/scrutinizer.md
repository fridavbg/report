<section>
  <h2>Scrutinizer</h2>
  <p>
    Om skall man jämföra med PHPMetrics som visar vilken kod som saknar tester, så visar Scrutinizer värden över kod som har tester 28%.Så att försöka att täcka mer utav källkoden med tester kan vara en förbättring.
  </p>
  <p>
    I Scrutinizer så har även LibraryControllern det högsta komplexitet värdet på 37. Scrutinizer använder en algoritm som kombinerar olika metrics (complexity, coupling, cohesion etc) till ett betyg. A är det högsta, och F är det lägsta.
  </p>
  <p>
    I rapporten så har alla klasserna fått ett A. Tittar man på funktionerna så finns det tre B och ett C. Majoriteten utav dem betygen är i LibraryControllern men även ett B finns i Blackjack klassen.I LibraryControllern så finns två olika sätt att lägga till bilder. Ett där användare lägger till en bildurl, och ett annat där en fil laddas upp till projektet. Bildurlen fungerar på studentservern medans filuppladdningen bara fungerar lokalt. Så en förbättring är att ta bort kod som bara fungerar lokalt.
  </p>
  <p>
    Om man går in i updateBookForm metoden i LibraryControllern som har ett C, så visas även ett CRAP score på 156. CRAP står för Change risk anti-pattern. Metoder med hög CRAP score kan vara svåra att ändra. Poängen beräknas ifrån cyclomatic complexity och brist på code coverage. JämföreIsevis så finns createBookform() som har ett A. men ett betydligt lägre CRAP på 30.
  </p>
</section>