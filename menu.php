<?php
session_start();

if (!isset($_SESSION['logged_in']))
{
	header('Location: index.php');
	exit();
}

require "navbar.html";

$counter=date('d');

?>
<div style="height: 600px; ">

<article>


<div class="main-title" style="padding-top: 30px;">
			
				Witaj
				<?php
		
		echo $_SESSION['username']."! <br/>";
		echo "<br><br>";
				?>
			
			</div>
			
		<div class="quotation" >
		cytat na dzisiaj:
		</div>
			
  <div style="color: black;
	font-style: italic;
	font-size: 20px;
	width: 70%;
	 text-align: center;
  border-spacing: 5px;
  	cursor: default;
	letter-spacing: 2px;
	border-radius: 20px;
	border: 2px solid grey;
	padding: 20px;

	background-color: #eee; 
	opacity: 0.9;
	-webkit-box-shadow: 3px 3px 30px 5px rgba(51,51,51,1);
	-moz-box-shadow: 3px 3px 30px 5px rgba(51,51,51,1);
	box-shadow: 3px 3px 30px 5px rgba(51,51,51,1);
	margin: 50px auto;">
		
			<?php
		
		
		
		
if ($counter==1){
echo "
Do sukcesu nie ma żadnej windy. Trzeba iść po schodach.
<br><br>
EMIL OESCH
";
}

if ($counter==2){
echo "
Jeśli ktoś nie wie, do którego portu chce przypłynąć, żaden wiatr mu nie sprzyja.
<br><br>
SENEKA
";
}

if ($counter==3){
echo "
Na szczęście człowieka składają się nie tyle wspaniałe uśmiechy fortuny, które zdarzają się rzadko, ile drobne korzyści, które przytrafiają się na co dzień.
<br><br>
BENJAMIN FRANKLIN
";
}
if ($counter==4){
echo "
Nie mów mi, jakie są twoje priorytety. Pokaż mi, na co wydajesz pieniądze, a sam ci powiem, gdzie one są.
<br><br>
JAMES W. FRICK
";
}
if ($counter==5){
echo "
Zrobić budżet to wskazać swoim pieniądzom, dokąd mają iść, zamiast się zastanawiać, gdzie się rozeszły.
<br><br>
JOHN C. MAXWELL
";
}
if ($counter==6){
echo "
Nikt by nie pamiętał o dobrym Samarytaninie, gdyby miał tylko dobre intencje. By przejść do historii, musiał mieć też pieniądze.
<br><br>
MARGARET THATCHER
";
}
if ($counter==7){
echo "
Nigdy nie znalazłem się w sytuacji, w której posiadanie pieniędzy pogorszyłoby ją.
<br><br>
CLINTON JONES
";
}
if ($counter==8){
echo "
Nawyk zarządzania pieniędzmi jest ważniejszy niż ilość posiadanych pieniędzy.
<br><br>
T. HARV EKER
";
}
if ($counter==9){
echo "
Nigdy nie polegaj na pojedynczym dochodzie. Inwestuj w siebie z zamiarem stworzenia drugiego źródła, potem trzeciego, potem czwartego.
<br><br>
WARREN BUFFETT
";
}
if ($counter==10){
echo "
Posiadanie pieniędzy polega na niewydawaniu ich.
<br><br>
AUTOR NIEZNANY
";
}
if ($counter==11){
echo "
Sama wiedza nie wystarczy, trzeba jeszcze umieć ją stosować.
<br><br>
JOHANN W. GOETHE
";
}
if ($counter==12){
echo "
Nie chodzi o to, żeby marzyć o tym, co chciałbyś mieć, chodzi o to, co robisz z tym, co już masz.
<br><br>
MUGGSY BOGUES
";
}
if ($counter==13){
echo "
Zasada nr 1: Nigdy nie trać pieniędzy. Zasada nr 2: Zawsze pamiętaj o zasadzie nr 1.
<br><br>
WARREN BUFFETT
";
}
if ($counter==14){
echo "
Tylko człowiek oszczędny i szanujący pieniądze może spać spokojnie i realnie myśleć o wolności finansowej.
<br><br>
AUTOR NIEZNANY
";
}
if ($counter==15){
echo "
Zbicie fortuny wymaga dużej dozy śmiałości i ogromu uwagi. A utrzymanie jej dziesięć razy tyle.
<br><br>
NATHAN MAYER ROTHSCHILD
";
}
if ($counter==16){
echo "
Nie musisz być bogaty, żeby zacząć, ale musisz zacząć, żeby być bogaty.
<br><br>
AUTOR NIEZNANY
";
}
if ($counter==17){
echo "
Bacz wpierw na oddawanie usług, zanim spojrzysz na zysk.
<br><br>
HENRY FORD
";
}
if ($counter==18){
echo "
Sekret polega na wydawaniu tego, co zostaje po odłożeniu oszczędności, a nie oszczędzaniu tego, co nie zostało wydane.
<br><br>
FRANK I MURIEL NEWMAN
";
}
if ($counter==19){
echo "
Gdy przestaniesz pracować, aktywa będą cię karmić, a pasywa pożerać.
<br><br>
ROBERT KIYOSAKI
";
}
if ($counter==20){
echo "
Inwestowanie powinno być jak oglądanie schnącej farby lub rosnącej trawy. Jeśli chcesz emocji, weź 800 dolarów i ruszaj do Las Vegas.
<br><br>
PAUL SAMUELSON
";
}
if ($counter==21){
echo "
Jest tylko jeden sposób, który pozwoli ci utrzymać bogactwo: wydawaj mniej, niż zarabiasz, a różnicę inwestuj.
<br><br>
AYN RAND
";
}
if ($counter==22){
echo "
Pamiętaj, synu, że w życiu nie liczą się tylko pieniądze… Warto mieć jeszcze nieruchomości, akcje i złoto.
<br><br>
ANDRZEJ MLECZKO
";
}
if ($counter==23){
echo "
Będę najtwardszym twardzielem i najsprytniejszym spryciarzem! Ale mój majątek zarobię uczciwie!
<br><br>
SKNERUS MCKWACZ
";
}
if ($counter==24){
echo "
Lepiej jest godzinę pomyśleć o swoich pieniądzach, niż tydzień na nie pracować.
<br><br>
ANDRÉ KOSTOLANY
";
}
if ($counter==25){
echo "
Bądź oszczędnym, abyś mógł być szczodrym.
<br><br>
ALEKSANDER FREDRO
";
}
if ($counter==26){
echo "
Największym ryzykiem jest niepodejmowanie ryzyka… W świecie, który zmienia się tak szybko, jedyna strategia, która gwarantuje porażkę, to niepodejmowanie ryzyka.
<br><br>
MARK ZUCKERBERG
";
}
if ($counter==27){
echo "
Bogaci bogacą się, tak jak zawsze się bogacili – rozumiejąc, jak działają pieniądze, i sprawiając, by pracowały dla nich.
<br><br>
ROBERT KIYOSAKI
";
}
if ($counter==28){
echo "
Aktywa przynoszą ci pieniądze, pasywa je zabierają. Bogaci za pieniądze kupują aktywa, biedni kupują pasywa.
<br><br>
ROBERT KIYOSAKI
";
}
if ($counter==29){
echo "
Interes, który nic poza pieniędzmi nie przynosi, jest złym interesem.
<br><br>
HENRY FORD
";
}
if ($counter==30){
echo "
Jeśli kupujesz rzeczy, których nie potrzebujesz, wkrótce zaczniesz sprzedawać rzeczy, których potrzebujesz.
<br><br>
WARREN BUFFETT
";
}
if ($counter==31){
echo "
Dziś zrób coś, czego innym się nie chce, a jutro będziesz miał to, czego inni pragną.
<br><br>
AUTOR NIEZNANY
";
}
/*
Bogaci dbają o to, żeby pieniądze ciężko na nich pracowały, biedni ciężko pracują na pieniądze.
T. HARV EKER

Nigdy nie wydawaj pieniędzy, zanim je będziesz miał.
AUTOR NIEZNANY

Aby znaleźć jednego księcia, trzeba pocałować wiele żab.
ROBERT KIYOSAKI

Nigdy nie jest za późno, by zadbać o przyszłość swoją i dzieci, rezygnując tylko trochę z teraźniejszości – a konkretnie z roztrwaniania pieniędzy na pierdoły.
AUTOR NIEZNANY

Nawyk zarządzania pieniędzmi jest ważniejszy niż ilość posiadanych pieniędzy.
T. HARV EKER

Ludzie nie planują przegrywać. Przegrywają, bo nie planują.
AUTOR NIEZNANY

Różnica pomiędzy ludźmi sukcesu a nieudacznikami polega na tym, że ci pierwsi niemal nałogowo robią rzeczy, których ci drudzy unikają jak diabeł święconej wody.
BRIAN TRACY

Uważaj na małe wydatki. Niewielki wyciek zatopi wielki statek.
BENJAMIN FRANKLIN

Pozytywne myślenie daje pozytywne rezultaty…, negatywne myślenie daje negatywne rezultaty…
NORMAN V. PEALE

Głównym powodem porażki i nieszczęścia jest wymienianie tego, czego najbardziej pragniesz, na to, czego pragniesz teraz.
AUTOR NIEZNANY

Fakt, że spółka, w którą inwestujesz pieniądze, ma wielki budynek, nie oznacza jeszcze, że pracują w nim mądrzy ludzie.
PETER LYNCH

Większość ludzi nie uzmysławia sobie tego, że w życiu nie chodzi o to, ile pieniędzy się robi, tylko o to, ile się zachowa.
ROBERT KIYOSAKI

Jak się nie ma miedzi, to się w domu siedzi.
AUTOR NIEZNANY

Pieniądze nie spadają z nieba, muszą być zarobione na ziemi.
MARGARET THATCHER

Pieniądza nie należy gonić, trzeba wyjść mu naprzeciw.
ARYSTOTELES ONASIS
*/
?>
	
  </div>


  

</article>
</div>
<?php
require "footer.html";
