wyjscie = {}

for uczennik, przedmioty in wejscie.items():
    srednia_ocen = sum([sum(oceny) for oceny in przedmioty.values()]) / sum([len(oceny) for oceny in przedmioty.values()])
    wyjscie[uczennik] = srednia_ocen

print(wyjscie)