flag = True
for i in range(0,10):
    userImput = int(input())
    if(userImput<=0):
        flag = False
        break
if flag:
    print("SUKCES")