flag = True
for i in range(1,11):
    for j in range(1,11):
        print(f"{i}X{j}=", end='')
        product = int(input())
        if product != i*j:
            print('SPRÓBUJ JESZCZE RAZ')
            flag = False
            break
    if flag == False:
        break
if flag:
    print('SUKCES')