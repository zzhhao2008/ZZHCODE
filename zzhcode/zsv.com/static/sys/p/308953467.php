<?php return array (
  'title' => '救我 QAQ',
  'p' => '#include<iostream>
using namespace std;
int a[10005];
int b[1005];
int find(int z)
{
	if(a[z]==z)
		return z;
	else
	{
		a[z]=find(a[z]);
		return a[z];
	}
}
void merge(int x,int y)
{
	a[find(y)]=find(x);
}
int main()
{
	int n,m,p,Y=0,N=0;
	cin>>n>>m>>p;
	int k,l;
	for(int i=0;i<n;i++)
	{
		cin>>a[i];
	}
	for(int i=0;i<m;i++)
	{
		cin>>k>>l;
		merge(k,l);
	}

	int u,o;
	for(int i=0;i<p;i++)
	{
		cin>>u>>o;
		if(find(u)==find(o))
			b[i]=1;
		else
			b[i]=2;
	}
	for(int i=0;i<p;i++)
	{
		if(b[i]==1)
			cout<<"Yes";
		if(b[i]==2)
			cout<<"No";
	}
 	return 0;
}
',
  'time' => 1691046533,
  'er' => '2155260790',
);?>