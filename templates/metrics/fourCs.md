<section>
<h2>Verktyg</h2>
<p>PHPUnit</p>
<p>PHPMetrics</p>
<p>Scrutinizer</p>
</section>

<section>
    <h2>Introduktion</h2>
    <h4>Dem fyra C:na</h4>
    <h3>
        Coverage
    </h3>
    <p>
        Coverage är det mätvärde som används för att se över hur mycket utav källkoden täcks utav tester, och även för att bedöma kvaliteten på test sviterna.  Det är ett sätt att förstå hur en applikation skall fungera när den används korrekt, men också vad som kan hända om någon använder applikationen på fel sätt.  Tester kan därför hjälpa till att förstå vart man skall lägga sin fokus, medans projektet växer. 
    </p>
    <p> 
        Det första värdet som jag fick i Scrutinizer för coverage var på 28%, och i PHPMetrics bekräftar detta då den visar på att 73.33% utav mina klasser ej är testade.
    </p>
    <hr/>
    <h3>
        Complexity
    </h3>
    <p>
        Code complexity är ett mätvärde som används för att kunna hitta onödigt komplicerad kod. Detta kan underlätta då ju mindre komplicerad kod, ju lättare är det för andra att underhålla koden medans ett projekt växer. Ju mer komplicerad kod desto större risk att koden är defekt, vilket kan betyda mer tid till att lösa buggar.
    </p>
    <p>
        Den bit utav min kod som verkar ha störst problem är min LibraryController som visas som den stora röda cirkeln i PHPMetrics Maintainability / complexity. Det finns även en liten röd cirkel som visar till min Dice klass, men den känns ej så akut då cyclomatic complexity ligger på 1 jämfört med LibraryControllerns 30.
    </p>
    <hr/>
    <h3>
        Cohesion
    </h3>
    <p>
        Cohesion är ett sätt att mäta samnhörighet emellan delar utav kod. Man kan säga att klasser som hör ihop skall grupperas tillsammans. Generellt så vill man att klasser och metoder har ett ända mål (single responsibility). Single responsibility principen säger att en klass eller metod skall ha enbart en anledning till att ändra på sig.
    </p>
    <p>
        I PHPMetrics så finns det ett LCOM mätvärde som står för Lack of Cohesion of Methods, som mäter antal ansvarsområden för en klass. I min rapport så har jag fått ett genomsnittsvärde på 1.34, vilket känns som ett ok värde, då det är låga värden är vad man vill ha. Enligt PHPMetrics så är ideal LCOM värde en 1. 
    </p>
    <hr/>
    <h3>
        Coupling
    </h3>
    <p>
        Coupling är ett mätvärden som mäter hur en bit av kod relaterar till en annan. Om ett problem uppkommer i en bit utav kod så kommer det påverka all kod som är kopplad till just den biten. För att undvika detta så vill man därför ha en svag koppling emellan delar utav koden, då det kan ibland vara svårt att se om till exempel en kopplad funktion ej blivit uppdaterad.
    </p>
    <p>
        I PHPMetrics så delas värden för coupling upp emellan AC, utgående koppling (Afferent coupling) och EC (Efferent coupling), ingående koppling. AC visar hur många klasser som kan bli påverkade utav en klass. I min rapport så kan man se att Deck klassen har ett AC värde på 7, vilket visar på att det är den klass som återanvänds mest i andra klasser. EC värdet för Deck klassen är betydligt mindre och ligger på 1. Detta med tanke på att endast en klass (Card klassen) används inuti Deck klassen.
    </p>
</section>
