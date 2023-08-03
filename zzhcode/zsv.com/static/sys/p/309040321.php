<?php return array (
  'title' => '已删除',
  'p' => '//（不知道A怎么加到条件里）
#include <iostream>
#include <cmath>
using namespace std;

int main()
{
    long long A, B;
    cin >> A >> B;

    int count = 0;
    long long sum = 0;
    long long sumer=1;
    while (sum <= B)
    {
        sum += sumer;
        sumer*=2;
        count++;
    }

    cout << count - 1 << endl;

    return 0;
}',
  'time' => 1691042581,
);?>