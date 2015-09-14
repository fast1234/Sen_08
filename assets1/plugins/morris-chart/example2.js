/********************************* BEGIN EXAMPLE MORRIS LINE *********************************/
Morris.Line({
  element: 'morris-line-example',
  data: [
    { y: '2006', a: 100 },
    { y: '2007', a: 75 },
    { y: '2008', a: 50 },
    { y: '2009', a: 65 },
    { y: '2010', a: 5 },
    { y: '2011', a: 25 },
    { y: '2012', a: 40 },
    { y: '2013', a: 50 },
    { y: '2014', a: 75 },
    { y: '2015', a: 45 },
    { y: '2016', a: 100 }
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Series A'],
  resize: true,
  lineColors: ['#8CC152', '#F6BB42']
});
/********************************* END EXAMPLE MORRIS LINE *********************************/
Morris.Bar({
  element: 'morris-bar-example',
  data: [
    { y: 'Shubham', a: 100 },
    { y: 'Patel', a: 75 },
    { y: 'Hello', a: 50 },
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Series A'],
  resize: true,
  barColors: ['#3BAFDA', '#8CC152']
});

/********************************* BEGIN EXAMPLE MORRIS DONUT *********************************/
Morris.Donut({
  element: 'morris-donut-example',
  data: [
    {label: "Download Sales", value: 12},
    {label: "In-Store Sales", value: 30},
    {label: "Mail-Order Sales", value: 20}
  ],
  colors: ['#E9573F', '#8CC152', '#F6BB42']
});

/********************************* END EXAMPLE MORRIS DONUT *********************************/
