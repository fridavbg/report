
        <p>
          Jag tyckte det var mycket lättare att jobba med PHPMetrics jämfört med Scrutinizer. Interfacet var mycket lättare att använda. Gillade att komplexitet och maintainability index visades som en "graph", som snabbt gav en överblick utav vilka klasser som behövdes ses över. Gillade inte riktigt att Scrutinizer skapade sin egna rating, i mitt fall så var ju dem flesta klasserna med ett A så kändes att jag fick ut mer i PHPMetrics. Sen så kändes lättare att testa saker och ting i PHPMetrics eftersom jag jobbade med det lokalt, och inte behövde pusha till git varje gång efter en ändring.
        </p>
        <p>
          Scrutinizer var lite krångligare att jobba med, då jag fick en hel del fel meddelande som tog en del tid att se över. Absolut att en fördel att få badges att använda i sitt github repo, kan ge snabbt ge en ide om kvalitet på ett projekt. Mitt första kodtäckningsvärde låg på 28 % men lyckade att höja det till 44 %. Min kodkvalitet låg på 9.8 och höjdes till 9.91.
        </p>
        <p>
          Kodkvalitet känns lite som att ha riktlinjer att följa för att "renskriva" ett projekt. Speciellt om man har ett lite större projekt så känns det som en fördel att ha automatiserade tester som ser över och presenterar statistik. Att manuellt gå över all kod känns som en rätt stor och tidskrävande process.Tror absolut att dem badges som visas upp i Scrutinizer kan ge en ide över kvaliteten på koden. Dem mindre värden gör att man vet lite bättre över vilka kod bitar som man skall se över, istället för att "läsa" igenom all kod. Tror dock att det finns en del nackdelar också, ju mer komplexitet ju svårare att se till så att en test svit kan täcka alla utfall.
        </p>
        <p>
          Mitt TIL för detta kursmoment har varit att sätta upp en Fixture. Ser det som ett stort plus att jag fick in dummy datan, dock fanns det en del saker som jag gärna hade fortsatt med men tiden räckte ej till. Men var kul att jobba med tester och komma igång lite med hur man kan testa en Controller i Symfony. Var rätt kul men lite pilligt att ha en databas för tester, en annan i Scrutinizer, lokalt osv. Men efter en del försök så gick min tester igenom både lokalt och i Scrutinizer builden.
        </p>