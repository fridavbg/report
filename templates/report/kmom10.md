 <h4>Krav 1 - Struktur och innehåll</h4>
 <p>
    Jag valde projektet Visualisera indikatorer för hållbarhet (sustainability) och mål 14, då havet är nått som ligger nära mitt hjärta. Svårt fann jag att hitta aktuell statisk, men hoppas ändå att den data som jag presenterar kan leda till en förståelse om hur plast skapas, och påverkar vår natur.
 </p>
        <p>
          Jag valde för slutprojektet att skapa mestadels med Make filer, då jag fann det väldigt smidigt. Tänkte även på hur Make la till filer i mappar och försökte sedan att följa den strukturen, och skapa mer mappar vid behov. Tex i templates/project så delade jag upp dem i mappar som charts/, login/ och sedan lämnat resterande template med mindre funktionalitet i huvudfilen /templates/project/.
        Då mitt projekt är en SPA sidan så valde jag även att dela upp mina controllers och sedan rendera dem direkt i min huvud template, vilket gjorde det lättare att jobba med varje enskild tabell och dess graf
        </p>
        <h4>Krav 2 - Databas med ORM</h4>
        <p>
          I min databas så använder jag totalt fem tabeller, som visar på hur mycket plast som produceras världen över, olika sorts plast som produceras, dess livslängd, som hur olika länders avfallshantering, samt en sista tabell för användare. Data för tabellerna lade jag in via csv filer som kan ses på i /var/statistics/. En motgång som jag fann var att hitta en aktuell och pålitlig källa över nuvarande status, så lade därför mer fokus på att informera om hur man kan agera och vart man kan hitta mer information.
        </p>
        <h4>Krav 3 - Utseende och användbarhet</h4>
        <p>
          Min ide med att sidans utseende var att användare skall tänka på havet, men samtidigt att sidan skall vara lättläst, då sidan innehåller en del text. Allting skall även vara lätt att hitta så här även markerat många element med skuggor och linjer för att visa ögat att här kan det hända något.
          Rör användare på muspekare så skall alla knappar och länkar ge en visuell indikation på att man kan gå vidare med ett klick.  
          Även lagt lite energi för att anpassa för lite mindre skärmar. Detta uppnådde jag genom att skapa en separate projectBase twig som också har en enskild css fil. 
        </p>
        <h4>Krav 5 - Inloggning</h4>
        <p>
          Inloggningen var helt klart den roligast biten, då jag har under kursens gång lagt en hel del tid att försöka förstå och läsa Symfony dokumentationen. Kändes som att jag lätt kunde hitta en hel del funktionalitet och snabbt få ihop en fungerande log in, efter jag hittade symfony/security-bundle. Jag valde att lämna den simpel för att även respektera tiden för inlämning. Dock så jag hittade del kul saker som hur man kan hasha lösenord till databasen, som jag gärna ser som en förbättringsdel.  
        </p>
              <h4>Allmänt stycke</h4>
        <p>
          Projektet för min del var väldigt roligt, då det var mycket fritt arbete. Jag kände verkligen att jag kunde ta vara på den tid som jag lagt för att förstå Symfonys dokumentation. Vad som jag fann mest utmanande vara att komma ihåg att köra alla skript och fokusera på kodkvaliteten. Att förstå Scrutinizer samt viss extra kod som kom till när jag använde Make, tog en hel del tid. 
        </p>
                <h4>Tankar om kursen</h4>
        <p>
          Jag är nöjd med kursen, då jag tidigare haft en hat-kärlek till PHP. Nu känner jag mig iallafall lite mer bekväm med att jobba med Symfony som ramverk. Rekommenderar gärna kursen, och ger den en 7:a. Jag hade gärna velat se lite mer hur man jobbar i verkliga världen, då jag fann det ganska lätt att glömma ett skript, speciellt ju mer jag la till i min composer.json. Frågor uppstår litegrann om hur man kan göra förhindra att glömma att köra ett script. 
        </p>
