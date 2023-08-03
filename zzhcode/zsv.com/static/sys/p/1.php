<?php return array (
  'title' => '已删除',
  'p' => '原标题：8.1-C题 没过样例 我的代码(用AI（<a href=\'http://uiai.vip/\'>uiai.vip</a>）修过没啥用[DOGE])
#include <iostream>
#include <queue>
using namespace std;
#define N 1000000
#define MOD 100003
#define INF 0x3f3f3f
int n, m, ecnt = 0;
int numPaths[N + 2], lowerD[N + 2], counter[N + 2];
bool have[N + 2] = {false};
struct node
{
    int u, v, w;
} edge[N + 2];
void addedge(int u, int v, int w)
{
    lowerD[u] = INF;
    edge[ecnt].u = u;
    edge[ecnt].v = v;
    edge[ecnt].w = w;
    ecnt++;
}
int main()
{
    cin >> n >> m;
    for (int i = 0; i < n; i++)
    {
        int x, y;
        cin >> x >> y;
        if (have[x] && have[y])
            continue;
        addedge(x, y, 1);
        addedge(y, x, 1);
        have[x] = true;
        have[y] = true;
    }
    queue<int> q;
    q.push(1);
    fill(lowerD, lowerD + N + 2, INF);
    fill(counter, counter + N + 2, 0);
    fill(numPaths, numPaths + N + 2, 0);
    lowerD[1] = 0;
    counter[1] = 1;
    numPaths[1] = 1;

    while (!q.empty())
    {
        int u = q.front();
        q.pop();
        for (int i = 0; i < ecnt; i++)
        {
            int v = edge[i].v, u2 = edge[i].u;
            if (lowerD[v] == INF)
            {
                q.push(v);
                lowerD[v] = lowerD[u2] + 1;
                counter[v] = counter[u2];
                numPaths[v] = (numPaths[u2] + 1) % MOD;
            }
            else if (lowerD[v] == lowerD[u2] + 1)
            {
                counter[v] = (counter[v] + counter[u2]) % MOD;
                numPaths[v] = (numPaths[u2] + numPaths[v]) % MOD;
            }
        }
    }
    for (int i = 1; i <= n; i++)
    {
        cout << counter[i] % MOD << endl;
    }
}
',
  'time' => 1690952691,
);?>