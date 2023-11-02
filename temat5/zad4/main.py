with open('wejscie.txt', 'r') as plik:
    linie = plik.readlines()
nowe_linie = [linia.strip() for linia in linie if linia.strip().startswith('A')]

with open('wejscie.txt', 'w') as plik:
    for linia in nowe_linie:
        plik.write(linia + '\n')