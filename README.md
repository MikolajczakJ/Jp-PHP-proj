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
<br><br>
## Kto co robi
### Jakub Mik
> - Strona od administratora (samochodów, i wynajmu, możliwość dodawania i edytowania samochodów oraz nadawanie praw admina)
> - mailer
> - dopracować edit_user.php (rozdzielić na skrypt i stronę)
### Wojtek
> - Logowanie i rejestracja<br>
    2.zabezpieczenie formularzy logowania i rejestracji (sprawdzenie czy wyagane pola nie są puste po stronie php, wprowadzenie regexów do hasła, czyszczenie tych stringów, żeby nie było zbędnych spacji itp[ jak na zajęciach z php w poprzednim semestrze]) <br>
    3.mailowe potwierdzenie rejestracji <br>
    4.formularz przypomnienia hasła, z mailem <br>
## Rzeczy do zrobienia
> - dodać kod do weryfikacji konta i  role w tabeli użytkownika
> - Wyskakujące powiadomienia przy wprowadzeniu nieporawnych danych (email, hasło, imie i nazwisko), do wykorzystania są funkcje z pliku reg.php. <br> 
    1.Wstęnie robimy powiadomienia w stylu nie udało się zalogować, jeśli będziemy mieli czas zaminimy na szczegóły, np pusty email, hasła się nie zgadzają, hasło nie spełnia wymagań itp <br>
    2.powiadomienie o wylogowaniu użytkownika <br>


> - Podział na strefę dla użytkowników i niezalogowanych <br>
    1.Zalogowany widzi to czego nie widzi niezalogowany i odwrotnie. Czyli trzeba upewnić się że zalogowany nie może wejść na stronę z logowaniem, a niezalogowany np na stronę z formularzem wynajmu i coś jeszcze by trzeba było wymyśleć <br>
    2.przycisk do rejestracji i logowania na navbarze, zalogowany widzi przycisk wyloguj <br>
    3.stronka też musi być widocznie inna dla niezalogowanych i zalogowanych <br>
    4.każda strona musi być odpowiednio zabezpieczona, jeśli użytkownik nie ma uprawnień to nie wchodzi <br>
    5.zalogowany użytkownik będzie miał możliwość zmiany hasła, czyli trzeba będzie stworzyć kolejną stronę, w stylu ustawienia konta czy coś <br>


> - dodatkowe rzeczy<br>
    1.odpowiedź zwrotna w postaci innego pliku niż html, np można zrobić tak, że po złożeniu zamówienia, użytkownik dostaje możliwość pobrania pdfa ze szczegółami np data, kto, gdzie, jaki samochód, id zamówienia <br>
    2.przyjmowanie plików od użytkownika - można zrobić to tak, że np admin przy dodawaniu samochodów może załadować zdjęcie. trzeba pamiętać o zabezpieczeniach <br>
    3.powiadomienia mailowe <br>
    4.konfiguracja serwera apache <br>
        a) - routing <br>
        b) - https<br>
        c) - zabezpieczenie folderów statycznych <br>



Trzeba pamiętać, że projekt ma być zamieszczony na gitlabie i, że mamy korzystać z dockera
## Temat projektu **Wypożyczalnia samochodów**


Zrobione
    1.Użytkownik po rejestracji zostaje automatycznie zalogowany <br>