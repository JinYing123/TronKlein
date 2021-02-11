 const _locals = [{
                             'name': 'English',
                             'value': 'en'
                         },{
     'name': '中文',
     'value': 'zh_CN'
 }];

 let lan = [];


// English
lan.push( {
    'sys': 'Language',
    'first_tip': 'This website uses cookies for the functions, analysis and advertising purposes described in our privacy policy. If you agree to use cookies, please continue to use our website.',
    'title': 'Klein create a financial myth in the field of smart contract, open, transparent and infinite cycle',
    'menu': ['How', 'TOP5 Day', 'Guide', 'TOP5 7Days'],
    'menu_detail':['How to join', '', 'Guide', ''],
    'part_1': {
        'title': 'Join',
        'cancel': 'Cancel',
        'join': 'Join',
        'edit':'Edit',
        'sponsor' : 'Start',
        'sponsor_info':'Please check recommender address',
        'sponsor_wait':'Please wait...',
        'cvip': 'CVIP',
        'cvip_detal': 'Become cvip',
        'to_be':'Be CVIP',
        'income':'Burning!'
    },
    'part_2': {
        'title': 'Data',
        'content': [{
            'title': 'Contract',
            'data': ['Address', 'Balance peak','Balance(TRX)', 'Recommendation Award', 'Recommendation Award 7Days','Total Address']
        },

            {
                'title': 'Insurance contract',
                'data': ['Insurance balance']
            },

            {
                'title': 'Person Data',
                'data': ['Recommender address',"Countdown", 'Amount', 'To be released', 'Released', 'Total released', 'Recommendation Num', 'To be released(Award)', 'CVIP num','Team num','Team amount']
            }
        ],
         'btns': ['Deposit', 'Withdraw', 'Copy Link','Release']
    },
    'success':'操作成功，请等待确认'
 });

 // 中文
 lan.push( {
     'sys': '系统语言',
     'first_tip': '本网站将cookies用于我们隐私政策中所述的功能、分析和广告目的。如果您同意我们使用cookies，请继续使用我们的网站。',
     'title': '波场克莱因打造智能合约领域的金融神话公开透明无限循环',
     'menu': ['如何加入', '1天TOP5排行榜', '指南', '7天TOP5排行榜'],
     'menu_detail':['如何加入说明', '', '指南说明', 'DONATE说明'],
     'part_1': {
         'title': '加入',
         'cancel': '撤销',
         'join': '加入',
         'edit':'编辑',
         'sponsor' : '开始合约',
         'sponsor_info':'检查你的邀请者身份。',
         'sponsor_wait':'请稍后...',
         'cvip': 'CVIP',
         'cvip_detal': '成为cvip 获取更多收益',
         'to_be':'立即成为CVIP',
         'income':'收益已燃烧'
     },
     'part_2': {
         'title': '数据统计',
         'content': [{
             'title': '智能合约',
             'data': ['智能合约地址', '合约存款峰值','合约当前TRX', '日推荐奖TRX', '7日推荐奖TRX','总地址数']
         },

             {
                 'title': '保险合约',
                 'data': ['保险金TRX']
             },

             {
                 'title': '个人统计信息',
                 'data': ['推荐人地址',"释放倒计时", '总合约金额', '未释放收益', '已释放未提取金额', '总释放金额', '直推合约地址', '待释放奖励', '旗下cvip数量','团队人数','团队总金额']
             }
         ],
         'btns': ['复投', '提现', '复制邀请链接','释放']
     },
     'success':'操作成功'
 });