<section>
<h2>Verktyg</h2>
<p>PHPUnit</p>
<p>PHPMetrics</p>
<p>Scrutinizer</p>
</section>

<section>
    <h2>Mätvärden</h2>
    <p>
        I rapporten så kommer följande mätvärden ligga i fokus:
    </p>
    <h3>
        Coverage
    </h3>
    <h4>
        Verktyg: PHPUnit & Scrutinizer
    </h4>
    <h4>
        Initialt värde i Scrutinizer:
    </h4>
    </br>
    <img alt="Code Coverage Scrutinizer 28%"src="https://scrutinizer-ci.com/g/fridavbg/report/badges/coverage.png?b=main"/>
    <h4>
        Intiialt värde i PHPUnit: 
    </h4> 
    </br>
    <img class="code-cvg-phpUnit" alt="Code Coverage PHPUnit" src="{{asset('img/metrics/PHPUnit-coverage.png')}}"/>
    <p>
        Coverage är det mätvärde som används för att se över hur mycket utav källkoden täcks utav tester, och även för att bedöma kvaliteten på test sviterna.  Det är ett sätt att förstå hur en applikation skall fungera när den används korrekt, och vart man skall lägga sin fokus. 
    </p>
    <p>
        Den första analys som jag fick i Scrutinizer var enbart på 28%, men detta ver ej så förvånande då jag vet att mina tester för tillfället bara täcker dem klasser som finns i projektet. Så ett mål för att förbättra min kodkvalitet är att göra flera tester som täcker mer utav källkoden.
    </p>
    <h3>
        Complexity
    </h3>
    <h4>
        Initiallt värde i Scrutinizer:
    </h4>
    <h4 style="color:red;">FIND CC in Scrutinizer!!!!!!!</h4>
     <h4>
        Intiialt värde i PHPMetrics: 
    </h4> 
    <img alt="Code Coverage PHPUnit" src="{{asset('img/metrics/maintainability-phpmetrics.png')}}"/>
    <img class="code-cvg-phpUnit" alt="Code Coverage PHPUnit" src="{{asset('img/metrics/cc-phpmetrics.png')}}"/>
    <p>
        Code complexity är ett mätvärde som används för att kunna hitta onödigt komplicerad kod. Detta kan underlätta då ju mindre komplicerad kod, ju lättare är det för andra att underhålla koden medans ett projekt växer. Ju mer komplicerad kod desto större risk att koden är defekt, vilket kan betyda mer tid till att lösa buggar.
    </p>
    <p>
        Den bit utav min kod som verkar ha störst problem är min LibraryController som visas som den stora röda cirkeln i PHPMetrics Maintainability / complexity, så ett utav mina mål med denna analys kommer att vara att förbättra den utöver bästa förmåga. Det finns även en liten röd cirkel som visar till min Dice klass, men den känns ej så akut då cyclomatic complexity ligger på 1 jämfört med LibraryControllerns 30.
    </p>
    <h3>
        Cohesion
    </h3>
    <h4>
        Initiallt värde i Scrutinizer:
    </h4>
    <h4 style="color:red;">
    FIND Cohesion in Scrutinizer!!!!!!!</h4>
    <h4>
        Intiialt värde i PHPMetrics: 
    </h4> 
    <h4 style="color:red;">FIND Cohesion in PHPMetrics!!!!!!!</h4>
    <p>Cohesion är ett sätt att mäta en klass eller en funktions ansvar, och hur dem hör ihop. En hög cohesion innebär att en klass eller metod har en single responsiblity, det vill säga att klassen har ett ansvarsområde.
    Men vill ofta att en klass eller funktion endast skall göra en sak, då blir kodkvaliteten lättare att underhålla.
    </p>
    <p></p>
    <h3>
        Coupling
    </h3>
      <h4>
        Initiallt värde i Scrutinizer:
    </h4>
    <h4 style="color:red;">FIND Coupling in Scrutinizer!!!!!!!</h4>
     <h4>
        Intiialt värde i PHPMetrics: 
    </h4> 
     <h4 style="color:red;">FIND Coupling in PHPMetrics!!!!!!!</h4>
    <p>
        Coupling är ett mätvärden som mäter hur en bit av kod relaterar till en annan. Om ett problem uppkommer i en bit utav kod så kommer det påverka all kod som är kopplad till just den biten. För att undvika detta så vill man därför ha en svag koppling emellan delar utav koden, då det kan ibland vara svårt att se om till exempel en kopplad funktion ej blivit uppdaterad.
    </p>
    <p></p>
    <h3>
        Andra mätvärden
    </h3>
    <h4>
        CRAP Score
    </h4>
    <h4>
        Initiallt värde i Scrutinizer:
    </h4>
    <h4 style="color:red;">FIND Cohesion in Scrutinizer!!!!!!!</h4>
     <h4>
        Intiialt värde i PHPMetrics: 
    </h4> 
    <h4 style="color:red;">FIND Cohesion in PHPMetrics!!!!!!!</h4>
</section>
<section>
    <h4>
        Källhänvisningar
    </h4>
    <ul>
        <li>
            <a class="standard-link" href="https://www.atlassian.com/continuous-delivery/software-testing/code-coverage" target="_blank">
                An introduction to code coverage by Atlassian
            </a>
        </li>
        <li>
            <a class="standard-link" href="https://linearb.io/blog/what-is-code-complexity/">
                What Is Code Complexity? What It Means And How To Measure It
            </a>
        </li>
    </ul>
</section>
