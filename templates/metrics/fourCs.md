<section>
  <h2>Introduktion</h2>
  <h4>Dem fyra C:na</h4>
  <h3>
    Coverage
  </h3>
  <p>
    är det mätvärde som används för att se över hur mycket källkod som täcks utav tester. Dem avgör också kodkvaliteten på testsviterna. Testerna kan hjälpa med att förstå hur en applikation skall fungera när den används korrekt, men också vad som kan hända om någon använder appen på fel sätt.
  </p>
  <p>
    Ju fler tester desto svårare kan det var att avgöra vilken del av appen som täcks utav testsviten. En code coverage report kan då ge en del riktlinger for att underlätta.
  </p>
  <p>
    Det första värdet som jag fick i Scrutinizer för coverage var på 28%, detta därför att mina tester enbart täcker mina klasser i Classes mappen, och ej andra delar utav min källkod. Detta påverkar då min kodkvalitet då en stor del utav mitt projekt ej har några unit tester, så det finns ingenting som kan identifiera eventuella felsteg i min logik. Även statistiken i PHP Metrics bekräftar detta, då den visar på att 73,33% utav mina klasser ej är testade.
  </p>
  <h3>
    Complexity
  </h3>
  <p>
    är ett mätvärde som används för att kunna hitta onödigt komplicerad kod. Mindre komplicerad kod gör det lättare att underhålla koden, speciellt om projektet växer. Ju mer komplicerad kod desto större risk att koden är defekt vilket kan betyda mer tid till att lösa och hitta buggar.
  </p>
  <p>
    När koden har många olika utkomster i loopar eller if statements, har många olika dependencies eller är kopplad till andra delar av koden så kan det vara svårt att avgöra vad som händer.
  </p>
  <p>
    I PHPMetrics så mäts komplexiteten tillsammans med Maintainability Index. LibraryControllern visas som den största röda cirklen, med en cyclomatic complexity på 30. Man kan även se att i Scrutinizer har den ett värde på 37 med en storlek pa 299.
  </p>
  <h3>
    Cohesion
  </h3>
  <p>
    är ett sätt att mäta samhörighet mellan delar utav kod inuti en module. Man kan säga att klasser som hör ihop skall grupperas tillsammans. Samhörighet på klassens data och metoder mäts emot klassens koncept. Moduler med hög cohesion föredras då dem oftare är lättare att jobba med.
  </p>
  <p>
    I PHPMetrics så mäts cohesion med ett LCOM värde. LCOM står för Lack Of Cohesion of Methods, som mäter antal ansvarsområden för en klass. I rapporten så är genomsnittsvärdet för LCOM på 1.34. Enligt PHP Metrics så är idealvärde 1.
  </p>
  <p>
    Scrutinizer använder en rating algorithm som kombinerar bla complexity, coupling och cohesion till ett betyg. A är högst, och F är det lägsta. I Scrutinizer rapporten så har alla klasser ett A, men ser man över vissa metoder speciellt i LibraryControllern så finns några B och C.
  </p>
  <h3>
    Coupling
  </h3>
  <p>
    är ett mätvärde som mäter hur en bit kod relaterar till en annan dvs sammanhörighet emellan moduler. Om ett problem uppstår i en kodbit så kommer det att påverka all kod som är kopplad till just den biten. För att undvika detta så vill man därför ha en svag koppling emellan moduler.
  </p>
  <p>
    I PHPMetrics så delas värden för coupling upp emellan AC, utgående koppling (Afferent Coupling) och EC (Efferent Coupling), ingående koppling. AC visar hur många klasser som kan bli påverkade utav en klass. I rapporten så visas Deck klassen med ett AC värde på 7, vilket visar att det är den klass som återanvänds mest i projektet. EC värdet för Deck Klassen är betydligt mindre och ligger på 1, vilket stämmer bra. Detta med tanke på att endast en Klass (Card Klassen) används inuti Deck Klassen.
  </p>
</section>
