#include <iostream>
#include "testapi.h"
#include <fstream>
#include <cassert>
using namespace std;


int main(){
    //ofstream out("salida.txt");

    cout<<"---------------testCliente-------------"<<endl;
    assert(false);
    if(sum(0, 0) == 0){
        cout << "Suma de 0s es correcta"<<endl;
    }else{
        cout << "No sabe sumar 0s"<<endl;
    }

    cout<<"-------------------------------------"<<endl;
    cout<<"1/1 pruebas aprobadas"<<endl;

    //out.close();

}
