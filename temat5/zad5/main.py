with open('wejscie.txt', 'r') as plik:
    zawartosc = plik.read()

odwrocona= zawartosc[::-1]

with open('wyjscie.txt', 'w') as plik_wyjscie:
    plik_wyjscie.write(odwrocona)
