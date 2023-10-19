userInput = int(input())
if userInput==1:
    print('TAK')
else:
    while True:
        if userInput ==1:
            print('TAK')
            break
        elif userInput%2== 0:
            userInput /= 2
            # tutaj będzie dalsze dzielenie
        else:
            print('NIE')
            break
