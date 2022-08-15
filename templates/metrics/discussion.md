<h2>Diskussion</h2>
<table>
<tr>
<th>PHP METRICS</th>
<th>Intiala värden</th>
<th>Efter förbättringar</th>
</tr>
  <tr>
    <th>Code Coverage classes never called by tests</th>
    <td>73.33%</td>
    <td>66.67%</td>
  </tr>
  <tr>
    <th>Maintainability Index LibraryController</th>
    <td>56.79</td>
    <td>64.95</td>
  </tr>
  <tr>
    <th>Cyclomatic Complexity LibraryController</th>
    <td>30</td>
    <td>17</td>
  </tr>
  <tr>
    <th>Cohesion - LCOM</th>
    <td>1.34</td>
    <td>1.31</td>
  </tr>
  <tr>
    <th>Afferent Coupling LibraryController</th>
    <td>0</td>
    <td>0</td>
  </tr>
    <tr>
    <th>Efferent Coupling LibraryController</th>
    <td>7</td>
    <td>7</td>
  </tr>
</table>
<br/>
<table>
<tr>
<th>Scrutinizer</th>
<th>Intiala värden</th>
<th>Efter förbättringar</th>
</tr>
  <tr>
    <th>Code Coverage</th>
    <td>28%</td>
    <td>44%</td>
  </tr>
  <tr>
    <th>Total complexiity LibraryController</th>
    <td>37</td>
    <td>24</td></td>
  </tr>
  <tr>
    <th>Size LibraryController</th>
    <td>299</td>
    <td>185</td>
  </tr>
    <tr>
    <th>Code Rating <br/>
    LibraryController::updateBookForm()
    </th>
    <td>C</td>
    <td>A</td>
  </tr>
    <tr>
    <th>CRAP Score <br/>
    LibraryController::updateBookForm()
    </th>
    <td>156</td>
    <td>2</td>
  </tr>
</table>

<p>
Om jag snabbt skall ser över mina resultat så kan man se att dem värdena som påverkade utav filuppladdnings koden var komplexitet, CRAP Score och storlek, vilket var lite det som jag förväntade mig då jag tog bort en del kod. Mest förvånade var nog att Maintainability Index har ökat.
</p>
<p>
En fördel att jobba med kodkvalitet är nog att man på ett snabbt sätt kan gå över koden, och se till så den följer vissa mönster, och logik. Men kan också se en hel del nackdelar, då det kan bli rätt tidskrävande att gå över alla aspekter utav ett större projekt.
</p>
