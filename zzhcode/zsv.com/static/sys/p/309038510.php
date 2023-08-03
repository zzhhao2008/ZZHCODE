<?php return array (
  'title' => '已删除',
  'p' => '#include<iostream>
using namespace std;
const int N=1e5;
int a[N];
int main()
{
 	int n,sum;
 	cin>>n;
 	for(int i=0;i<n;i++)
 	{
 		cin>>a[i];
	}
	for(int i=0;i<n;i++)
	{
		if(a[i]==1)
		{
			sum=n-i;
			break;
		}
		else
			sum=1;
	}
	cout<<sum;
 	return 0;
}
',
  'time' => 1691042563,
);?>