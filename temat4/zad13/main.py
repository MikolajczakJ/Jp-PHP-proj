import string
wartosc = input()
if any(znak in string.whitespace for znak in wartosc):
    print("TAK")
else:
    print("NIE")