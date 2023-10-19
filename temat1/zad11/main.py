kDigits = []
countEven = 0
for i in range(0,1000):
    element = int(input())
    kDigits.append(element)
    if element%2 == 0:
        countEven+=1
print(countEven)