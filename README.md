#Projekt-Zespołowy
=================
## Kilka adnotacji
``Logowanie`` - z racji bezpieczeństwa powinniśmy przemyśleć sposób logowania jak i utrzymywania sesji, najlogiczniejszym sposobem jest moim zdaniem stworzenie generowanego klucza w ciasteczku który bd sprawdzał przy logowaniu z ciasteczka czy to na pewno jest ten użytkownik. Klucz byłby generowany przy każdym zalogowaniu z formularza i utrzymywany przez czas utrzymania sesji.

##Ad hoc pytania ``Dlaczego nie działa mi strona?``
Prosta odpowiedź, lokalizacja frameworka, z racji tego, że tworzyłem to w htdocs xamppa a jak wiemy nie da się mieć wszystkiego w 1 folderze to stworzyłem subfoldery tak więc aby uruchomić stronę trzeba zrobić kilka kroków:
* Sprawdzić czy folder z frameworkiem jest na poziomie dostępu do strony tj: trzymać stronę w folderze który jako brata ma folder zawierający framework.
Przykład:
htdocs->informatica->index.php etc etc
		framework  ->yiic.php etc etc
lub dłuższe zajęcie zmienić plik index.php tak by wskazywał na dobry folder

* Uruchomić w bazie danych skrypty o nazwie ``mysql.sql`` oraz ``auth-schema-mysql.sql``