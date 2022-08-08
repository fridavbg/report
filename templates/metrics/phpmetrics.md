<section>
  <h2>PHP Metrics</h2>
  <p>
    Code coverage rapporten ifrån PHPMetrics visar på att en stor del utav källkoden saknar tester. Den säger också att klasser som har högst komplexitet är i störst behov utav tester. I detta projekt så finns t ex LibraryControllern med ett cyclomatiskt complex värde på 30. LibraryControllern hanterar en hel del routers, rendera twig templates, användarinput, filuppladdning m.m. Som klass så följer den därför inte alls Single Responsibility Principen. Den har ett flertal ansvarsområden som gör att det finns mer resultat att kolla så att det blir rätt. För att jämföra så kan man titta på JsonCardControllern som endast har ett ansvarsområde att rendera en kortlek i Jsonformat. Det cyclomatiska komplexvärdet ligger pa 1.
  </p>
  <p>
    I PHPMetrics så visas tillsammans med komplexitet värde, CC ett maintainability index, MI. CC representeras utav storlek på en cirkel och MI visas som en färg i antingen rött, grönt eller gult. Om man då tittar på bilden så visas LibraryControllern som den största röda cirkeln. Minde komplexa klasser är dem minsta gröna cirklarna.
  </p>
  <p>
    Lack of Cohesion, LCOM är det värde som visar Cohesion. I rapporten så ligger ProductControllern med högst värde på 4. ProductControllern hanterar flowet på en CRUD app, så 4 ansvarsområden känns rimligt. LibraryControllern är ju även den en CRUD app, men med mer komplexitet.
  </p>
  <p>
    Högst AC, utgånde koppling har Deck klassen, vilket stämmer då det är den klass som återanvänds mest i andra klasser. Högst EC, ingående koppling får LibraryControllern vilket får mig att fundera på mina use statements och hur dem kan påverka rapporten.
  </p>
  <p>
    Andra värden som jag valt att se över är violations, errors och warnings. Rapporten visar 6 violations, 5 warnings och 1 error. Två klasser CardController med 0.41 buggar och LibraryControllern med 0.74 buggar visas som “ Probably bugged” och LibraryControllern visar även en varning om att koden är för komplex. Andra varningar är att Card, Deck samt Entity ej följer Stable Abstractions Principen, vilket innebär att deras funktionalitet kan vara svår att återanvända utan att ändra befintlig kod.
  </p>
</section>