sequence= []
evenCounter = 0
while True:
    element = input()
    if element == 'STOP':
        break
    else:
        element = int(element)
        sequence.append(element)
        if element%2 == 0:
            evenCounter+=1
print(evenCounter)