values = []
sum = 0
iloczyn = 1
count = 0
while True:
    value = float(input())
    if value <=0:
        break
    else:
        values.append(value)
        count +=1
        sum+=value
        iloczyn *=value

print(sum)
print(iloczyn)
print(sum/count)
print(iloczyn**(1/float(count)))