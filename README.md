#Projekt-Zespołowy
=================
## Kilka adnotacji
``Logowanie`` - z racji bezpieczeństwa powinniśmy przemyśleć sposób logowania jak i utrzymywania sesji, najlogiczniejszym sposobem jest moim zdaniem stworzenie generowanego klucza w ciasteczku który bd sprawdzał przy logowaniu z ciasteczka czy to na pewno jest ten użytkownik. Klucz byłby generowany przy każdym zalogowaniu z formularza i utrzymywany przez czas utrzymania sesji.