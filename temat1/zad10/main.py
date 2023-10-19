tenDigits = []
countEven = 0
for i in range(0,10):
    element = int(input())
    tenDigits.append(element)
    if element%2 == 0:
        countEven+=1
print(countEven)