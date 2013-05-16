#Projekt-Zespołowy
=================
## Kilka adnotacji
``Logowanie`` - z racji bezpieczeństwa powinniśmy przemyśleć sposób logowania jak i utrzymywania sesji, najlogiczniejszym sposobem jest moim zdaniem stworzenie generowanego klucza w ciasteczku który bd sprawdzał przy logowaniu z ciasteczka czy to na pewno jest ten użytkownik. Klucz byłby generowany przy każdym zalogowaniu z formularza i utrzymywany przez czas utrzymania sesji.

##Ad hoc pytania ``Dlaczego nie działa mi strona?``
Prosta odpowiedź, lokalizacja frameworka, z racji tego, że tworzyłem to w htdocs xamppa a jak wiemy nie da się mieć wszystkiego w 1 folderze to stworzyłem subfoldery tak więc aby uruchomić stronę trzeba zrobić kilka kroków:

* Stworzyć baze danych o nazwie informatica dla konta root
* Sprawdzić czy folder z frameworkiem jest na poziomie dostępu do strony tj: trzymać stronę w folderze który jako brata ma folder zawierający framework.
Przykład:
htdocs->informatica->index.php etc etc
		framework  ->yiic.php etc etc
lub dłuższe zajęcie zmienić plik index.php tak by wskazywał na dobry folder

* Uruchomić w bazie danych skrypty o nazwie ``mysql.sql`` oraz ``auth-schema-mysql.sql``

##"Rights"
Aplikacja również korzysta z gotowego modułu "Rights" dzięki temu modułowi możemy łatwo i szybko zarządzać uprawnieniami użytkowników w naszej aplikacjii. Więcej informacji na temat tego modułu znajdziecie:
https://code.google.com/p/yii-rights/    oraz bezpośrednio do dokumentacji: 
http://yii-rights.googlecode.com/files/yii-rights-doc-1.2.0.pdf


Notatka: w configu trzeba dorzucic moduł install na true i wejść przez /index.php?r=rights

##"Tagi"
Metody publiczne: http://www.yiiframework.com/extension/taggable-behaviour/#hh13
Najprościej ujmując $model->tags->add/get/has/remove/reset/set("tagi po przecinku (jbc można zmienić separator ale nw po co), jak bd dodawane z zmiennej to polecam najpierw zrobić convert na string tj (string)$this->tags ie.");

##"Autocomplete"
http://www.yiiframework.com/wiki/361/simple-way-to-use-autocomplete-using-different-id-and-display-value/
http://www.yiiframework.com/doc/api/1.1/CJuiAutoComplete

##"Theme"
Zaaplikowałem nowy layout dla strony. Znajduję się on w katalogu głównym aplikacji w folderach:
~~~
.
|-- css
|   `-- neutraldesk
|       |-- images
|       |   `-- (...)
|       |-- js
|       |   `-- (...)
|       |-- readme-license-hotwebsitetemplates.txt
|       `-- style.css
|-- README.mkd
|-- source
|   `-- neutraldesk.zip
`-- themes
    `-- neutraldesk
        `-- views
            |-- layouts
            |   |-- column1.php
            |   |-- column2.php
            |   `-- main.php
            `-- site
                |-- contact.php
                |-- error.php
                |-- login.php
                `-- pages
                    `-- about.php
