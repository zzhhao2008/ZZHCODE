<?php return array (
  'title' => '已删除',
  'p' => '#include <bits/stdc++.h>

using namespace std;

int a[10010];
int find(int n)
{
	if(a[n]==n) return n;
	else return a[n] = find(a[n]);
}

void merge(int x, int y)
{
	a[find(y)] = find(x);
	return ;
}

int main()
{
	int n, m, p;
	cin >> n >> m >> p;
	for(int i=1; i<=n; i++)
		a[i] = i;
	
	int a1, b;
	for(int i=1; i<=m; i++)
	{
		cin >> a1 >> b;
		merge(a1, b);
	}
	
	int c, d;
	for(int j=1; j<=p; j++)
	{
		cin >> c >> d;
		if(find(c)==find(d)) cout << "Yes" << endl;
		else cout << "No" << endl;
	}
}',
  'time' => 1691042552,
);?>