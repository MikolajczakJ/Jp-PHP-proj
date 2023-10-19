a = float(input())
b = float(input())
c = float(input())
delta = b**2-4*a*c
print(delta)
if delta>0:
    x1 = (-b-delta**0.5)/(2*a) #wzór na x1
    x2 = (-b+delta**0.5)/(2*a)  #wzór na x2
elif delta ==0:
    x1 = -(b/(2*a)) #wzór na x
    x2 = None
else:
    x1 = None
    x2 = None
print(x1)
print(x2)