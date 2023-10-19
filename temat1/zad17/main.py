h=int(input())
space=' '
asterisk='*'
k=h
for n in range(0,h+1):
    i=2*n-1
    print(k*space+i*asterisk)
    k=k-1