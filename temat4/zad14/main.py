import string
wartosc = input()
if any(znak not in string.ascii_letters for znak in wartosc):
    print("TAK")
else:
    print("NIE")