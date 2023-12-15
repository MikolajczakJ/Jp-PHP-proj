# Jp-PHP-proj
Projekt na Języki programowania - PHP
## Autorzy Projektu
> - Jakub Mikołajczak
> - Jakub Kumer
> - Wojciech Mułkowski
> - Kacper Łokietek
## Komendy do gita
> - git clone {link do repozytorium} - klonuje repo z linku
> - git add *  - dodaje wszystkie wprowadzone zmiany
> - git commit -m "info o zmianach" - zatwierdza wszystkie zmiany
> - git push - wysyła zmiany do repozytorium
## Wymagania projektu
> - zawiera system użytkowników z możliwością rejestracji, logowania i wylogowania,
> - zawiera przynajmniej jeden formularz, którego dane po przesłaniu są walidowane, czyszczone, przetwarzane i zapisywane w bazie danych,
> - wyświetla dane z bazy danych w określonej formie, (np. lista dostępnych samochodów)
> - zawiera podstrony dostepne publicznie jak i takie tylko dla zalogowanych użytkowników (np publicznie można zobaczyć jakie samochody są dostępne ale jeśli ktoś chce wypożyczyć to musi złożyć konto)
## Dodatkowo oceniane jest
> - zastosotawnie paginacji (przy wyświetlaniu listy dostepnych samochodów)
> - odpowiedź zwrotna w postaci pliku innego niż HTML
> - wysyłanie maili potwierdzających wypełninie formularza (w przypadku założenia konta/ zmiany hasła oraz wypożyczenia samochodu)
> - konfiguracja serwera Apache

## Rzeczy do zrobienia
<<<<<<< HEAD
> - Wyskakujące powiadomienia przy wprowadzeniu nieporawnych danych (email, hasło, imie i nazwisko), do wykorzystania są funkcje z pliku reg.php


Trzeba pamiętać, że projekt ma być zamieszczony na gitlabie i, że mamy korzystać z dockera
## Temat projektu **Wypożyczalnia samochodów** (może ulec zmianie)
=======
> - Wyskakujące powiadomienia przy wprowadzeniu nieporawnych danych (email, hasło, imie i nazwisko), do wykorzystania są funkcje z pliku reg.php. <br> 
    >> - Wstęnie robimy powiadomienia w stylu nie udało się zalogować, jeśli będziemy mieli czas zaminimy na szczegóły, np pusty email, hasła się nie zgadzają, hasło nie spełnia wymagań itp <br>
    >> - powiadomienie o wylogowaniu użytkownika <br>


> - Podział na strefę dla użytkowników i niezalogowanych <br>
    >> - Zalogowany widzi to czego nie widzi niezalogowany i odwrotnie. Czyli trzeba upewnić się że zalogowany nie może wejść na stronę z logowaniem, a niezalogowany np na stronę z formularzem wynajmu i coś jeszcze by trzeba było wymyśleć <br>
    >> - przycisk do rejestracji i logowania na navbarze, zalogowany widzi przycisk wyloguj <br>
    >> - stronka też musi być widocznie inna dla niezalogowanych i zalogowanych <br>
    >> - każda strona musi być odpowiednio zabezpieczona, jeśli użytkownik nie ma uprawnień to nie wchodzi <br>
    >> - zalogowany użytkownik będzie miał możliwość zmiany hasła, czyli trzeba będzie stworzyć kolejną stronę, w stylu ustawienia konta czy coś <br>



> - Logowanie i rejestracja<br>
    >> - Użytkownik po rejestracji zostaje automatycznie zalogowany <br>
    >> - zabezpieczenie formularzy logowania i rejestracji (sprawdzenie czy wyagane pola nie są puste po stronie php, wprowadzenie regexów do hasła, czyszczenie tych stringów, żeby nie było zbędnych spacji itp[ jak na zajęciach z php w poprzednim semestrze]) <br>
    >> - mailowe potwierdzenie rejestracji <br>
    >> - formularz przypomnienia hasła, z mailem <br>


> - dodatkowe rzeczy<br>
    >> - odpowiedź zwrotna w postaci innego pliku niż html, np można zrobić tak, że po złożeniu zamówienia, użytkownik dostaje możliwość pobrania pdfa ze szczegółami np data, kto, gdzie, jaki samochód, id zamówienia <br>
    >> - przyjmowanie plików od użytkownika - można zrobić to tak, że np admin przy dodawaniu samochodów może załadować zdjęcie. trzeba pamiętać o zabezpieczeniach <br>
    >> - powiadomienia mailowe <br>
    >> - konfiguracja serwera apache <br>
        >>> - routing <br>
        >>> - https<br>
        >>> - zabezpieczenie folderów statycznych <br>




Trzeba pamiętać, że projekt ma być zamieszczony na gitlabie i, że mamy korzystać z dockera
## Temat projektu **Wypożyczalnia samochodów**
>>>>>>> master
