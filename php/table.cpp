#include<iostream>
using namespace std;

int main(){
int a = 20;
while(true)
{
    cout<<a<<endl;
    a-=2;
    if(a==2) break;
}
return 0;
}