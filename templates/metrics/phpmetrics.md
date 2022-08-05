<!-- PHPMETRICS -->
<!-- 
Skapa en rubrik “Phpmetrics” och analysera dess rapport för din kod. Använd 4C på utvalda delar av din kod och hitta minst ett ytterligare mätvärde som du väljer att ta upp. Använd mätvärdena för att hitta flaskhalsar och svaga punkter i din kod. Det vill alltså hitta kod-delar som du kan uppdatera för att få bättre mätvärden.
-->
<section>
    <h2>
        PHPMetrics
    </h2>
    <h4>
        Code coverage värden i PHPMetrics: 
    </h4> 
    <img class="code-cvg-phpUnit" alt="Classes never called by tests 73.33%" src="{{asset('img/metrics/phpmetrics-codecoverage.png')}}"/>
    <p>Classes never called by tests 73.33%</p>
    <img class="code-cvg-phpUnit" alt="Code Coverage PHPMetrics CC values" src="{{asset('img/metrics/phpmetrics-cc.png')}}"/>
    <p>
    Cyclomatisk complexitet för LibraryControllern: 30
    </p>
    <p>
    Cyclomatisk complexitet för JsonCardControllern: 1
    </p>
    <p>
            Code coverage rapporten i PHPMetrics visar på att mycket utav källkoden ej har några tester, vilket bekräftar det som jag tog upp tidigare. Den visar även att dem klasser som har högst komplexitet är dem som har störst behov utav tester. I detta projekt så finns till exempel LibraryControllern med ett cyclomatisk complex värde på 30. LibraryContollern har i detta fall allt ansvar som en CRUD app har. Den hanterar därför allt som är kopplat till databasen, ta in ny data, ändra data, läs data och ta bort data. 
            Även kod som kan ladda upp filer lokalt, men ej fungerar på studentservern finns med i vissa funktioner.
            Som klass följer den därför in alls Single Responsibility Principen, och desto mer ansvarsområden ju fler resultat finns det att kolla så att det blir rätt. 
            För att jämföra så finns JsonCardControllern som endast har ett ansvar att rendera en kortlek i Json format, och på så sätt har en låg cyclomatisk komplexitet på 1.
            PHPMetrics visar på så sätt vilka klasser som kommer behöva mest tester och vart man skall lägga sin fokus på.
    </p>
    <h4>
        Intiiala complexity värden i PHPMetrics: 
    </h4> 
    <img alt="Maintainability/Complexity PHPMetrics" src="{{asset('img/metrics/maintainability-phpmetrics.png')}}"/>
    <img class="code-cvg-phpUnit" alt="Code Coverage PHPUnit" src="{{asset('img/metrics/cc-phpmetrics.png')}}"/>
    <p>
        I PHPMetrics så visas tillsammans med complexitet värdena ett maintainability index som då baseras på detta värde. Dem ger då en ganska klar överbild på vilka klasser som i framtiden eventuellt kan få buggar. Om man tittar på bilden så visas därför LibraryControllern som den största röda cirkeln, då den är den klass som har mest möjliga utkomster. Medans mindre komplexa klasser representeras som mindre gröna cirklar. Om man går djupare så kan man även finns statisik över varje enskild klass, så då kan hjälpa att eventuellt avgöra om man behöver bryta ner klass funktionalitet till mindre moduler, vilket kan vara fallet i LibraryControllern.
    </p>
    <h4>
        Intiiala Cohesion värden i PHPMetrics: 
    </h4> 
    <img class="code-cvg-phpUnit" alt="Cohesion PHPMetrics" src="{{asset('img/metrics/cohesion-phpmetrics.png')}}"/>
    <p>
        LCOM, Lack of Cohesion of Methods är det värde som PHPMetrics använder för att visa Cohesion. I rapporten så ligger ProductControllern med högst värde på 4, vilket innebär att denna Controllern totalt har fyra ansvar, vilket stämmer då det är en CRUD app där varje metod hanterar en produkt lägger till, läser, uppdaterar och tar bort. 
        Fundering är då varför LibraryControllern som även den hanterar en CRUD app men har ett LCOM värde på 1. Största skillnaden är ju då att data renderas direkt i JSON format i ProductControllern medans LibraryControllern samlar upp all data och sedan renderar dem i twig templates, men är det då detta som avgör LCOM värdet.
    </p>
    <h4>
        Intiiala coupling värden i PHPMetrics: 
    </h4> 
       <img class="code-cvg-phpUnit" alt="Coupling PHPMetrics" src="{{asset('img/metrics/coupling-phpmetrics.png')}}"/>
        <p>
            När det kommer till coupling på bilden så kan man se att högst AC, utgående koppling har Deck klassen, vilket stämmer då det den klass som återanvänds mest i andra klasser. Högst EC, ingående koppling får LibraryControllern, vilket får mig att fundera på alla parametrar som används när jag valde att försöka ladda upp en bildfil. 
        </p>
</section>
