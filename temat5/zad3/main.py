sum = 0
with open("wejscie.txt") as plik:
    for linia in plik.readlines:
        sum += int(linia.strip()) 
    print (sum)