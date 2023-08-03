<?php return array (
  'title' => '已删除',
  'p' => '#include<iostream>
using namespace std;
const int N=1e5;
int a[N];
int main()
{
 	int n,sum,b;
 	cin>>n;
 	for(int i=0;i<n;i++)
 	{
 		cin>>a[i];
	}
	for(int i=0;i<n;i++)
	{
		if(a[i]==1)
		{
			for(int j=0;j<n;j++)
			{
				if(a[i]==1)
					a[i]==0;
				else
					a[i]==1;
			}
			sum++;
		}
	}
	for(int i=0;i<n;i++)
	{
		b+=a[i];
	}
	if(b==0)
		sum=0;
	sum+=1;
	cout<<sum;
 	return 0;
}
',
  'time' => 1691042560,
);?>